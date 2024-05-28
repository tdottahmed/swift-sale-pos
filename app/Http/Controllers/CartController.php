<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Country;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Models\ShippingCharge;
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
         
         $grandTotal = Cart::subtotal(2,'.','') + $totalShippingCharge;
         
        }else{
         $grandTotal = Cart::subtotal(2,'.','');
         $totalShippingCharge = 0;
        }
       
      return view('frontend.porto.checkout', [
      'countries' => $countries,
      'customerAddress' => $customerAddress,
      'totalShippingCharge' => $totalShippingCharge,
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

        $shipping = 0;
        $discount = 0;
        $subTotal = Cart::subtotal(2, '.', '');

        //Calculate shiooing
        $shippingInfo = ShippingCharge::where('country_id',$request->country)->first();
        $totalQty = 0;
            foreach(Cart::content() as $item){
                $totalQty += $item->qty;
            }

        if($shippingInfo != null){
                    $shipping = $totalQty*$shippingInfo->amount;
                    $grandTotal = $subTotal+$shipping;
            
                    
                }else{
            
                $shippingInfo = ShippingCharge::where('country_id','rest_of_world')->first();
                $shipping = $totalQty*$shippingInfo->amount;
                    $grandTotal = $subTotal+$shipping;
            
                    
            
                }


        
        $order = new Order;
        $order->subtotal = $subTotal;
        $order->shipping = $shipping;
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

        }


        session()->flash('success','You have successfully placed your order.');
        Cart::destroy();
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
    $totalQty = Cart::content()->sum('qty');
    $shippingCharge = 0;

    if ($request->country_id > 0) {
        $shippingInfo = ShippingCharge::where('country_id', $request->country_id)->first();

        if (!$shippingInfo) {
            $shippingInfo = ShippingCharge::where('country_id', 'rest_of_world')->first();
        }

        if ($shippingInfo) {
            $shippingCharge = $totalQty * $shippingInfo->amount;
        }
    }

    $grandTotal = $subTotal + $shippingCharge;

    return response()->json([
        'status' => true,
        'grandTotal' => number_format($grandTotal, 2),
        'shippingCharge' => number_format($shippingCharge, 2),
    ]);
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
