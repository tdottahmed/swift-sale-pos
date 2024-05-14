<?php

use App\Services\Avatar;
use Illuminate\Support\Str;
use App\Models\Organization;
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
   