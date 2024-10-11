<?php

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Country;
use App\Mail\OrderEmail;
use App\Services\Avatar;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

if (!function_exists('avatar')) {
    function avatar()
    {
        if (auth()->user()->image != null) {
            return asset(auth()->user()->photo);
        } else {
            return Avatar::create(Str::upper(auth()->user()->name));
        }
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage($file, $directory)
    {
        if (!$file) {
            return null;
        }
        Storage::makeDirectory($directory);
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs($directory, $fileName, 'public');
        return $filePath;
    }
}

if (!function_exists('imagePath')) {
    function imagePath($path)
    {
        if ($path) {
            return asset('storage/' . $path);
        } else {
            return asset('limitless/global_assets/images/placeholders/404-Illustration.png');
        }
    }
}

if (!function_exists('customAvatar')) {
    function customAvatar($name)
    {
        return Avatar::create(Str::upper($name));
    }
}

if (!function_exists('readableDate')) {
    function readableDate($date)
    {
        $date = Carbon::parse($date);
        $day = $date->format('jS');
        $month = $date->format('F');
        $year = $date->format('Y');
        return "$day $month, $year";
    }
}

if (!function_exists('orderEmail')) {
    function orderEmail($orderId, $userType = "customer")
    {
        $order = Order::where('id', $orderId)->with('items')->first();

        if ($userType == 'customer') {
            $subject = 'Thanks For Your Order';
            $email = $order->email;
        } else {
            $subject = 'You Have Receive An Order';
            $email = env('ADMIN_EMAIL');
        }

        $mailData = [
            'subject' => $subject,
            'order' => $order,
            'userType' => $userType,
        ];
        Mail::to($email)->send(new OrderEmail($mailData));

        // dd($order);
    }
}

if (!function_exists('getCountryInfo')) {
    function getCountryInfo($id)
    {
        return Country::where('id', $id)->first();
    }
}
if (!function_exists('calculateDaysPassed')) {
    function calculateDaysPassed($createdAt)
    {
        $createdDate = Carbon::parse($createdAt);
        // $daysPassed = $createdDate->diffInDays(Carbon::now());
        $timePassed = $createdDate->diffForHumans(Carbon::now(), true);
        return $timePassed;
    }
}
if (!function_exists('organizationDetails')) {
    function organizationDetails($name)
    {
        $organization = Organization::where('name', $name)->first()->value;
        return $organization;
    }
}
