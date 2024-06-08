<?php

use App\Models\Order;
use App\Mail\OrderEmail;
use Illuminate\Support\Facades\Mail;

function orderEmail($orderId) {
    $order = Order::where('id', $orderId)->with('items')->first();
    $mailData = [
        'subject' => 'Thanks for your order',
        'order' => $order
    ];

    Mail::to($order->email)->send(new OrderEmail($mailData));

    // dd($order);
}
