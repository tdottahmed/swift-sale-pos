<?php

use App\Services\Avatar;
use Illuminate\Support\Str;
use App\Models\Organization;

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
   