<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderedItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function index(Request $request){


        $orders = Order::get();
        // $orders = Order::latest('orders.created_at')->select('orders.*','users.name','users.email');
        

        // $orders = $orders->leftJoin('users','user_id','orders.user_id');
        // if($request->get('keyword') != ""){
        //     $orders = $orders->where('users.name','like','%'.$request->keyword.'%');
        //     $orders = $orders->orWhere('users.email','like','%'.$request->keyword.'%');
        //     $orders = $orders->orWhere('orders.id','like','%'.$request->keyword.'%');

        // }

        // dd($orders);

        return view('orders.index', [
            'orders' => $orders,
        ]);
    }

    public function detail($orderId){
        $orders = Order:: select('orders.*','countries.name as countryName')
         ->where('orders.id', $orderId)
        ->leftJoin('countries','countries.id','orders.country_id')
        ->first();

        $orderItems = OrderedItem::where('order_id',$orderId)->get();

        return view('orders.detail', [
            'orders' => $orders,
            'orderItems' => $orderItems
        ]);
    }


    public function myOrder(){
     
        $data = [];
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at','DESC')->get();
        $data['orders'] = $orders;
        return view('frontend.porto.myaccount', $data);
    }

    public function orderDetail($id){


        $data = [];
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('id', $id)->first();
        $data['order'] = $order;

        $orderItems = OrderedItem::where('order_id', $id)->get();

        $data['orderItems'] = $orderItems;
        return view('frontend.porto.order-detail', $data);
    }


}
