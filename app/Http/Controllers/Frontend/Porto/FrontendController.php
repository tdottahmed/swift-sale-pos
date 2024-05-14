<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.porto.index');
    }

    public function singleProduct(){
        return view('frontend.porto.product.single-product');
    }

    public function products(){
        return view('frontend.porto.product.products');
    }
   
    

}
