<?php
namespace App\Http\Controllers;

use App\Models\DiscountCoupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountCodeController extends Controller
{
    public function index(){
        $discountCoupons = DiscountCoupon::latest()->get();
        // dd($discountCoupons);
       return view('coupon.index', compact('discountCoupons'));
    }

    public function create(){
        return view('coupon.create');
    }

    public function store(Request $request){
      $validator = Validator::make($request->all(),[
        'code' => 'required',
        'type' => 'required',
        'discount_amount' => 'required|numeric',
        'status' => 'required',
      ]);

      if($validator->passes()){

        // starting date must be current date
        if(!empty($request->starts_at)){
            $now = Carbon::now();
            $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
            
            if($startAt->lt($now)){
                return response()->json([
                    'status' => false,
                    'errors' => ['starts_at' => 'Start date can not be less than current time']
                 ]);
            }
        }

        //expire date must be greater than start date
        if (!empty($request->starts_at) && !empty($request->expires_at)) {
            $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
            $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
            if($expiresAt->gt($startAt) == false){
                return response()->json([
                    'status' => false,
                    'errors' => ['expires_at' => 'Expiry date must be greater than start date']
                ]);
            }
        }

        $discountCode = new DiscountCoupon();
        $discountCode->code = $request->code;
        $discountCode->name = $request->name;
        $discountCode->description = $request->description; // corrected typo
        $discountCode->max_uses = $request->max_uses;
        $discountCode->max_uses_user = $request->max_uses_user;
        $discountCode->type = $request->type;
        $discountCode->discount_amount = $request->discount_amount;
        $discountCode->min_amount = $request->min_amount;
        $discountCode->status = $request->status;
        $discountCode->starts_at = $request->starts_at;
        $discountCode->expires_at = $request->expires_at;
        $discountCode->save();
         
        $message = 'Discount Coupon Added Successfully';
        session()->flash('success', $message);

        return response()->json([
            'status' => true,
            'message' => $message,
         ]);
      } else {
        return response()->json([
           'status' => false,
           'errors' => $validator->errors()
        ]);
      }
    }

    public function edit(Request $request, $id){
        $coupon = DiscountCoupon::find($id);
        if($coupon == null){
          session()->flash('error', 'Record not found');
        }
        $data['coupon'] = $coupon;
           return view('coupon.edit', $data);
    }

    

    // public function update(Request $request, $id){
    //     $discountCode = DiscountCoupon::find($id);
        

    //     if($discountCode == null){
    //         session()->flash('error','Record Not Found');
    //         return response()->json([
    //             'status' => true,
    //          ]);
    //     }


    //     $validator = Validator::make($request->all(),[
    //         'code' => 'required',
    //         'type' => 'required',
    //         'discount_amount' => 'required|numeric',
    //         'status' => 'required',
    //       ]);
    
    //       if($validator->passes()){
    
    //         // starting date must be current date
    //         if(!empty($request->starts_at)){
    //             $now = Carbon::now();
    //             $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
                
    //             if($startAt->lt($now)){
    //                 return response()->json([
    //                     'status' => false,
    //                     'errors' => ['starts_at' => 'Start date can not be less than current time']
    //                  ]);
    //             }
    //         }
    
    //         //expire date must be greater than start date
    //         if (!empty($request->starts_at) && !empty($request->expires_at)) {
    //             $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
    //             $startAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
    //             if($expiresAt->gt($startAt) == false){
    //                 return response()->json([
    //                     'status' => false,
    //                     'errors' => ['expires_at' => 'Expiry date must be greater than start date']
    //                 ]);
    //             }
    //         }
    
    //         $discountCode->code = $request->code;
    //         $discountCode->name = $request->name;
    //         $discountCode->description = $request->description; // corrected typo
    //         $discountCode->max_uses = $request->max_uses;
    //         $discountCode->max_uses_user = $request->max_uses_user;
    //         $discountCode->type = $request->type;
    //         $discountCode->discount_amount = $request->discount_amount;
    //         $discountCode->min_amount = $request->min_amount;
    //         $discountCode->status = $request->status;
    //         $discountCode->starts_at = $request->starts_at;
    //         $discountCode->expires_at = $request->expires_at;
    //         $discountCode->save();
             
    //         $message = 'Discount Coupon Added Successfully';
    //         session()->flash('success', $message);
    
    //         return response()->json([
    //             'status' => true,
    //             'message' => $message,
    //          ]);
    //       } else {
    //         return response()->json([
    //            'status' => false,
    //            'errors' => $validator->errors()
    //         ]);
    //       }
    // }
    // public function update(Request $request, $id){
    //     $discountCode = DiscountCoupon::find($id);
    
    //     if(!$discountCode){
    //         session()->flash('error', 'Record Not Found');
    //         return redirect()->route('coupon.index');
    //     }
    
    //     $validator = Validator::make($request->all(), [
    //         'code' => 'required',
    //         'type' => 'required',
    //         'discount_amount' => 'required|numeric',
    //         'status' => 'required',
    //     ]);
    
    //     if($validator->fails()){
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    
    //     if(!empty($request->starts_at)){
    //         $now = Carbon::now();
    //         $startAt = Carbon::parse($request->starts_at);
            
    //         if($startAt->lt($now)){
    //             return redirect()->back()->withErrors(['starts_at' => 'Start date cannot be in the past'])->withInput();
    //         }
    //     }
    
    //     if (!empty($request->starts_at) && !empty($request->expires_at)) {
    //         $startAt = Carbon::parse($request->starts_at);
    //         $expiresAt = Carbon::parse($request->expires_at);
    //         if($expiresAt->lte($startAt)){
    //             return redirect()->back()->withErrors(['expires_at' => 'Expiry date must be after start date'])->withInput();
    //         }
    //     }
    
    //     $discountCode->fill($request->except('_token'));    
    //     $discountCode->save();
    
    //     session()->flash('success', 'Discount Coupon Updated Successfully');
    
    //     return redirect()->route('coupon.index');
    // }
    
    public function update(Request $request, $id){
        $discountCode = DiscountCoupon::find($id);
    
        if(!$discountCode){
            session()->flash('error', 'Record Not Found');
            return redirect()->route('coupon.index');
        }
    
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
            'status' => 'required',
        ]);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $data = $request->only([
            'code',
            'name',
            'description',
            'max_uses',
            'max_uses_user',
            'type',
            'discount_amount',
            'min_amount',
            'status',
            'starts_at',
            'expires_at',
        ]);
    
        $discountCode->fill($data);
        $discountCode->save();
    
        session()->flash('success', 'Discount Coupon Updated Successfully');
    
        return redirect()->route('coupon.index');
    }
        
    public function destroy(Request $request, $id){
        $discountCode = DiscountCoupon::find($id);
        if(!$discountCode){
            session()->flash('error', 'Record not found');
            return redirect()->back();
        }

        $discountCode->delete();

        session()->flash('success', 'Discount Coupon Deleted Successfully');
        return redirect()->route('coupon.index');
    }
}
