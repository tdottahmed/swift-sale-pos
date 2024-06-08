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

// function organizationName()
// {
//     $organization = Organization::first();
//     return $organization;
// }


// function organizationLogo()
// {
    
 function avatar()
 {
   if (auth()->user()->image != null) {
      return asset(auth()->user()->photo);
  } else {
      return Avatar::create(Str::upper(auth()->user()->name));
  }
 }

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

 function imagePath($path)
 {
    $image = asset('storage/'.$path);
    return $image;
 }
   

 function customAvatar($name)
 {
    return Avatar::create(Str::upper($name));
 }

 function readableDate($date)
    {
        $date = Carbon::parse($date);
        $day = $date->format('jS');
        $month = $date->format('F');
        $year = $date->format('Y');
        return "$day $month, $year";
    }



    function orderEmail($orderId, $userType="customer") {
      $order = Order::where('id', $orderId)->with('items')->first();

      if($userType == 'customer'){

         $subject = 'Thanks For Your Order';
         $email = $order->email;
      }else{
         $subject = 'You Have Receive An Order';
         $email = env('ADMIN_EMAIL');
      }
      
      $mailData = [
          'subject' => 'Thanks for your order',
          'order' => $order,
          'userType' => $userType,
      ];

      
  
      Mail::to($email)->send(new OrderEmail($mailData));
  
      // dd($order);
  
  }

  function getCountryInfo($id){
  return Country::where('id', $id)->first();
  }