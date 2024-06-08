<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use App\Models\DiscountCoupon;
use App\Models\ShippingCharge;
use App\Models\CustomerAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addToCart(Request $request)
{
    $product = Product::with('images')->find($request->id);
    if($product == null){
        return response()->json([
           'status' => false,
           'message' => 'Product not found'
        ]);
    }

    if (Cart::count() > 0){
    //    echo "if part";
 // Products found in cart
 //check if this product already in the cart
 //Return a message that product already added in your cart
 //if product not found in the cart, then add product in cart

    $cartContent = Cart::content();
    $productAlreadyExist = false;

    foreach($cartContent as $item){
        if($item->id == $product->id){
            $productAlreadyExist= true;
        }
    }

    if($productAlreadyExist == false){
        Cart::add($product->id, $product->name, 1, $product->selling_price, ['productImage'=> (!empty($product->images)) ? $product->images->first() : '']);
        $status = true;
        $message = '<strong>' .$product->name. ' </strong> added in Your cart Successfully!!';
       session()->flash('success', $message);


    }else{
      $status = false;
      $message = $product->name.' already added in cart';
    }


    }else{
        // echo "else part";
      //Cart is empty
      Cart::add($product->id, $product->name, 1, $product->selling_price, ['productImage'=> (!empty($product->images)) ? $product->images->first() : '']);
      $status = true;
      $message ='<strong>' .$product->name. ' </strong> added in Your cart Successfully!!';
      session()->flash('success', $message);

    }
    return response()->json([
        'status' => $status,
        'message' => $message
     ]);
    
    // Cart::add('293ad', 'Product 1', 1, 9.99);

    // $productId = $request->input('id');
    // Add product to cart logic
    
    // return response()->json(['message' => 'Product added to cart successfully']);
}

    public function cart(){
        $cartContent = Cart::content();
        // dd($cartContent);
        $data['cartContent'] = $cartContent;
        return view('frontend.porto.cart', $data);
    }


    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        $itemInfo = Cart::get($rowId);
        $product = Product::find($itemInfo->id);
        //check qty available in a stock
        if($product->manage_stock == 'Yes'){

           if($qty <= $product->qty){
            Cart::update($rowId, $qty);
            $message = 'Card Updated Successfully!';
            $status = true;
          
           }else{
            $message = 'Requested qty('.$qty.') not available in stock';
            $status = false;
            session()->flash('error', $message);

           }
        }else{
            Cart::update($rowId, $qty);
            $message = 'Card Updated Successfully!';
            $status = true;
            session()->flash('success', $message);

        }


       
        
        return response()->json([
          'status' => $status,
          'message' => $message
        ]);
    }

    public function deleteItem(Request $request){
        // $rowId = $request->rowId;
        $itemInfo = Cart::get($request->rowId);
        if($itemInfo == null){
            $errorMessage = 'Item not Found in cart';
            session()->flash('error', $errorMessage);

            return response()->json([
                'status' => false,
                'message' => $errorMessage
               ]);
        }
       Cart::remove($request->rowId);

       $successMessage = 'item Remove for cart Successfully';

       session()->flash('success', $successMessage);

            return response()->json([
                'status' => true,
                'message' => $successMessage
               ]);
      
    }

    public function checkout(){

        $discount = 0;

        if(Cart::count() == 0){
            return redirect()->route('frontend.cart');
        }

        if(Auth::check() == false){
            if(!session()->has('url.intended')){
                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('login');
        }


        $customerAddress = CustomerAddress::where('user_id',Auth::user()->id)->first();
        
        session()->forget('url.intended');

        $countries = Country::orderBy('name', 'ASC')->get();

        $subTotal = cart::subtotal(2,'.','');

        //apply discount here
        if(session()->has('code')){
            
            $code = session()->get('code');
    
        if($code->type == 'percent'){
          $discount = $code->discount_amount/100*$subTotal;
        }else{
          $discount = $code->discount_amount;
        }
        }




        // Calculate shipping 
        if($customerAddress != ''){
            // dd($customerAddress);
            $userCountry = $customerAddress->country_id;
           
            $shippingInfo = ShippingCharge::where('country_id', $userCountry)->first();
         
            // dd($shippingInfo);

         $totalQty = 0;
         $totalShippingCharge = 0;
         $grandtotal = 0;
         foreach(Cart::content() as $item){
             $totalQty += $item->qty;
         }

         $totalShippingCharge = $totalQty*$shippingInfo->amount;
         
         $grandTotal = ($subTotal-$discount) + $totalShippingCharge;
         
        }else{
         $grandTotal = ($subTotal-$discount);
         $totalShippingCharge = 0;
        }
       
      return view('frontend.porto.checkout', [
      'countries' => $countries,
      'customerAddress' => $customerAddress,
      'totalShippingCharge' => $totalShippingCharge,
      'discount' => $discount,
      'grandTotal' => $grandTotal,
      ]);
    }

    public function processCheckout(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'mobile' => 'required',

        ]);
        if($validator->fails()){
            return response()->json([
                 'message' => 'Please Fix the Errors',
                 'status' => false,
                 'errors' => $validator->errors()
            ]);
        }
    //   $customerAddress = CustomerAddress::find();
    $user = Auth::user();

    CustomerAddress::updateOrCreate(
        ['user_id' => $user->id],
        [
            'user_id' => $user->id,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email' =>$request->email,
            'mobile' =>$request->mobile,
            'country_id' =>$request->country,
            'address' =>$request->address,
            'apartment' =>$request->apartment,
            'city' =>$request->city,
            'state' =>$request->state,
            'zip' =>$request->zip,
            'first_name' =>$request->first_name,
            'first_name' =>$request->first_name,
        ]
    );
        

    if($request->payment_method == 'cod'){

        $discountCodeId = null;
        $promoCode = '';
        $shipping = 0;
        $discount = 0;
        $subTotal = Cart::subtotal(2, '.', '');

        if(session()->has('code')){
            $code = session()->get('code');
    
        if($code->type == 'percent'){
          $discount = $code->discount_amount/100*$subTotal;
        }else{
          $discount = $code->discount_amount;
        }
        $discountCodeId = $code->id;
        $promoCode = $code->code;
      }

        //Calculate shiooing
        $shippingInfo = ShippingCharge::where('country_id',$request->country)->first();
        $totalQty = 0;
            foreach(Cart::content() as $item){
                $totalQty += $item->qty;
            }

        if($shippingInfo != null){
                    $shipping = $totalQty*$shippingInfo->amount;
                    $grandTotal = ($subTotal-$discount)+$shipping;
            
                    
                }else{
            
                $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
                $shipping = $totalQty*$shippingInfo->amount;
                    $grandTotal = ($subTotal-$discount)+$shipping;
            
                    
            
                }



        
        $order = new Order;
        $order->subtotal = $subTotal;
        $order->shipping = $shipping;
        $order->discount = $discount;
        $order->coupon_code_id = $discountCodeId;
        $order->coupon_code = $promoCode;
        $order->payment_status = 'not paid';
        $order->status = 'pending';
        $order->grand_total = $grandTotal;
        $order->user_id = $user->id;


        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->mobile = $request->mobile;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->state = $request->state;
        $order->city = $request->city;
        $order->zip = $request->zip;
        $order->notes = $request->order_notes;
        $order->country_id = $request->country;
        $order->save();

        foreach (Cart::content() as $item){
        $orderItem = new OrderedItem;
        
        $orderItem->product_id = $item->id;
        $orderItem->order_id = $order->id;
        $orderItem->name = $item->name;
        $orderItem->qty = $item->qty;
        $orderItem->price = $item->price;
        $orderItem->total = $item->price*$item->qty;
        $orderItem->save();

        //update product stock
        $productData = Product::find($item->id);

        if($productData->track_qty == 'yes'){
            $currentQty = $productData->opening_stock;
            $updatedQty = $currentQty - $item->qty;
            $productData->opening_stock = $updatedQty;
            $productData->save();

            
        }
       
        }



        // send order email 
        orderEmail($order->id, 'customer');


        session()->flash('success','You have successfully placed your order.');
        Cart::destroy();

        session()->forget('code');

        return response()->json([
            'message' => 'Order save Successfully.',
            'orderId' => $order->id,
            'status' => true
       ]);


    }else{

    }

    }

 public function thankyou($id){
      return view('frontend.porto.thanks', [
        'id'=>$id
      ]);
 }

//  public function getOrderSummary(Request $request){
//    $subTotal = Cart::subtotal(2,'.','');

//  if($request->country_id > 0){
// //    $subTotal = Cart::subtotal(2,'.','');
//     $shippingInfo = ShippingCharge::where('country_id',$request->country_id)->first();
//     $totalQty = 0;
//     foreach(Cart::content() as $item){
//         $totalQty += $item->qty;
//     }

//     if($shippingInfo != null){
//         $ShippingCharge = $totalQty*$shippingInfo->amount;
//         $grandTotal = $subTotal+$ShippingCharge;

//         return response()->json([
//             'status' => true,
//             'grandTotal' => number_format($grandTotal,2),
//             'shippingCharge'=> number_format($ShippingCharge,2),
//         ]);
//     }else{

//     $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
//     $ShippingCharge = $totalQty*$shippingInfo->amount;
//         $grandTotal = $subTotal+$ShippingCharge;

//         return response()->json([
//             'status' => true,
//             'grandTotal' => number_format($grandTotal,2),
//             'shippingCharge'=> number_format($ShippingCharge,2),
//         ]);

//     }
//  }else{
//     return response()->json([
//         'status' => true,
//         'grandTotal' => number_format($subTotal,2),
//         'shippingCharge'=> number_format(0,2),
//     ]);

//  }
//  }

public function getOrderSummary(Request $request)
{
    $subTotal = Cart::subtotal(2, '.', '');
    $discount = 0;
    $discountString = '';
    if(session()->has('code')){
        $code = session()->get('code');

    if($code->type == 'percent'){
      $discount = $code->discount_amount/100*$subTotal;
    }else{
      $discount = $code->discount_amount;
    }

    $discountString = '
    <div id="discount-response">
        <strong> '.$code->code.'</strong>
        <a class="btn btn-sm btn-danger" id="remove-discount"><i class="fa fa-times"></i></a>
    </div>
   
';

    }


    
    $totalQty = Cart::content()->sum('qty');
    $shippingCharge = 0;

    if ($request->country_id > 0) {
        $shippingInfo = ShippingCharge::where('country_id', $request->country_id)->first();
        //start
        $totalQty = 0;
        foreach(Cart::content() as $item){
            $totalQty += $item->qty;
        }
        if ($shippingInfo != null) {
            $shippingCharge = $totalQty*$shippingInfo->amount;
            $grandTotal = ($subTotal-$discount)+$shippingCharge;

            return response()->json([
                'status' => true,
                'grandTotal' => number_format($grandTotal, 2),
                'discount' => number_format($discount, 2),
                'discountString' => $discountString,
                'shippingCharge' => number_format($shippingCharge, 2),
            ]);
        }else{
            $shippingInfo = ShippingCharge::where('country_id', 'rest_of_world')->first();
            $shippingCharge = $totalQty*$shippingInfo->amount;
            $grandTotal = ($subTotal-$discount)+$shippingCharge;
            return response()->json([
                'status' => true,
                'grandTotal' => number_format(($subTotal-$discount), 2),
                'discount' => number_format($discount, 2),
                'discountString' =>$discountString,
                'shippingCharge' => number_format($shippingCharge, 2),
            ]);
         
        }

        // if (!$shippingInfo) {
        //     $shippingInfo = ShippingCharge::where('country_id', 'rest_of_world')->first();
        // }

        // if ($shippingInfo) {
        //     $shippingCharge = $totalQty * $shippingInfo->amount;
        // }
    }else{
        return response()->json([
            'status' => true,
            'grandTotal' => number_format($subTotal, 2),
            'discount' => $discount,
            'shippingCharge' => number_format(0, 2),
        ]);
    }

    // $grandTotal = $subTotal + $shippingCharge;

    // return response()->json([
    //     'status' => true,
    //     'grandTotal' => number_format($grandTotal, 2),
    //     'shippingCharge' => number_format($shippingCharge, 2),
    // ]);
}

public function applyDiscount(Request $request){

    $code = DiscountCoupon::where('code', $request->code)->first();

    if($code == null){
        return response()->json([
            'status' => false,
            'message' => 'Invalid Discount Coupon',
        ]);
    }

    $now = Carbon::now();

    // echo $now->format('Y-m-d H:i:s');

    if($code->starts_at != ""){
     $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->starts_at);

     if($now->lt($startDate)){
        return response()->json([
            'status' => false,
            'message' => 'Invalid Discount Coupon',
        ]);
     }
    }


    if($code->expires_at != ""){
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $code->expires_at);
   
        if($now->gt($endDate)){
           return response()->json([
               'status' => false,
               'message' => 'Invalid Discount Coupon',
           ]);
        }
       }
       
       //max uses check

      if($code->max_uses > 0){
        $couponUsed = Order::where('coupon_code_id', $code->id)->count();
       if($couponUsed >= $code->max_uses){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Discount Coupon',
            ]);
        
       }
      }
       
         // max uses user check

      if($code->max_uses_user > 0){
        $couponUsedByuser = Order::where(['coupon_code_id' => $code->id, 'user_id'=>Auth::user()->id])->count();
        if($couponUsedByuser >= $code->max_uses_user){
             return response()->json([
                 'status' => false,
                 'message' => 'You already userd this coupon code',
             ]);
         
        }
      }
      
      $subTotal = Cart::subtotal(2,'.','');

    //   min amount condition check 
      if($code->min_amount > 0){
       if($subTotal < $code->min_amount){
        return response()->json([
            'status' => false,
            'message' => 'Your min amount must be'.$code->min_amount.'.',
        ]);
       }
      }



       session()->put('code', $code);
       return $this->getOrderSummary($request);

}

public function removeCoupon(Request $request){
     session()->forget('code');
     return $this->getOrderSummary($request);

}


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
