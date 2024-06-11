<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Shipping;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view shipping', ['only' => ['index']]);
        $this->middleware('permission:create shipping', ['only' => ['create', 'store']]);
        $this->middleware('permission:update shipping', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete shipping', ['only' => ['destroy']]);
    }

    public function index(){
        $shippings = ShippingCharge::get();
        return view('shipping.index',compact('shippings'));

    }
    public function create(){
        $countries = Country::get();
        $data['countries'] = $countries;
        $shippingcharges = ShippingCharge::leftJoin('countries','countries.id','shipping_charges.country_id')->get();
        $data['shippingcharges'] = $shippingcharges;

        return view('shipping.create',$data);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'amount' => 'required|numeric'
        ]);
    
        if ($validator->passes()) {
            // Check if a shipping charge already exists for the selected country
            $existingShipping = ShippingCharge::where('country_id', $request->country)->first();
            if ($existingShipping) {
                return response()->json([
                    'status' => false,
                    'errors' => [
                        'country' => 'A shipping charge already exists for this country.'
                    ]
                ]);
            }
    
            $shipping = new ShippingCharge;
            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();
    
            session()->flash('success', 'Shipping added successfully');
    
            return response()->json([
                'status' => true,
                'redirect' => route('shipping.index') // Include the redirect URL
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    
    // public function store(Request $request){
    //      $validator = Validator::make($request->all(),[
    //          'country' => 'required',
    //          'amount' => 'required|numeric'
    //       ]);

    //       if($validator->passes()){
    //            $shipping = new ShippingCharge;
    //            $shipping->country_id = $request->country;
    //            $shipping->amount = $request->amount;
    //            $shipping->save();

    //            session()->flash('success', 'Shipping added successfully');

    //            return response()->json([
    //             'status' => true,
    //          ]);

    //       }else{
    //         return response()->json([
    //            'status' => false,
    //            'errors' => $validator->errors()
    //         ]);
    //       }
    // }
    public function edit($id){
        $shipping = ShippingCharge::find($id);
    
        if (!$shipping) {
            return response()->json([
                'status' => false,
                'message' => 'Shipping charge not found.'
            ]);
        }
    
        $countries = Country::get();
        $data['countries'] = $countries;
        $data['shipping'] = $shipping;
    
        return view('shipping.edit', $data);
    }
    

    // public function update(Request $request, $id){
    //     $validator = Validator::make($request->all(), [
    //         'country' => 'required',
    //         'amount' => 'required|numeric'
    //     ]);
    
    //     if ($validator->passes()) {
    //         $shipping = ShippingCharge::find($id);
    //         if (!$shipping) {
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Shipping charge not found.'
    //             ]);
    //         }
    
    //         $shipping->country_id = $request->country;
    //         $shipping->amount = $request->amount;
    //         $shipping->save();
    
    //         session()->flash('success', 'Shipping updated successfully');
    
    //         // return response()->json([
    //         //     'status' => true,
    //         // ]);
    //         return redirect()->route('shipping.index');

    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'errors' => $validator->errors()
    //         ]);
    //     }
    // }

    
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'country' => 'required',
            'amount' => 'required|numeric'
        ]);
    
        if ($validator->passes()) {
            $shipping = ShippingCharge::find($id);
            if (!$shipping) {
                return response()->json([
                    'status' => false,
                    'message' => 'Shipping charge not found.'
                ]);
            }
    
            // Check if a shipping charge already exists for the selected country
            $existingShipping = ShippingCharge::where('country_id', $request->country)
                                              ->where('id', '!=', $id)
                                              ->first();
            if ($existingShipping) {
                return response()->json([
                    'status' => false,
                    'errors' => [
                        'country' => 'A shipping charge already exists for this country.'
                    ]
                ]);
            }
    
            $shipping->country_id = $request->country;
            $shipping->amount = $request->amount;
            $shipping->save();
    
            session()->flash('success', 'Shipping updated successfully');
            return response()->json([
                'status' => true,
                'redirect' => route('shipping.index') // Include the redirect URL
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    
    

    public function delete($id){
        $shipping = ShippingCharge::find($id);
    
        if (!$shipping) {
            return response()->json([
                'status' => false,
                'message' => 'Shipping charge not found.'
            ]);
        }
    
        $shipping->delete();
    
        session()->flash('success', 'Shipping deleted successfully');
    
        return redirect()->route('shipping.index');
    }
}

