<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('frontend.porto.index');
    }


    public function card(){
        return view('frontend.porto.card');
    }

    public function checkout(){
        return view('frontend.porto.checkout');
    }
   
    

}
