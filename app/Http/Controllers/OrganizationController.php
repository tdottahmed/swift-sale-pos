<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OrganizationController extends Controller
{
    public function index(){
        $organizations = Organization::get();
        return view('organization.index',compact('organizations'));
    }

    public function create(){
        return view('organization.create');
    }

    public function store(Request $request){

        $image = $request->file('logo');
        $footer_logo = $request->file('footer_logo');
        $favicon = $request->file('favicon');
        // $request->validate([
        //     'title'=>'required',
        //     'favicon'=>'required',
        //     'email'=>'required',
        //     'phone'=>'required',
        //     'telephone_no'=>'required',
        //     'address'=>'required',
        //     'facebook'=>'required',
        //     'twitter'=>'required',
        //     'skype'=>'required',
        //     'linkdein'=>'required',
        //     'currency'=>'required',
        //     'time_zone'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);

        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/organization/'.$image_name));
        }
        if($footer_logo){
            $footer_logo_name = uniqid().'.'.$footer_logo->getClientOriginalExtension();

            Image::make($footer_logo)->resize(200,250)->save(public_path('storage/organization/'.$footer_logo_name));
        }
        if($favicon){
            $favicon_name = uniqid().'.'.$favicon->getClientOriginalExtension();

            Image::make($favicon)->resize(200,250)->save(public_path('storage/organization/'.$favicon_name));
        }


        Organization::create([
            'title'=>$request->title,
            'favicon'=>$request->favicon,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'telephone_no'=>$request->telephone_no,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'skype'=>$request->skype,
            'linkdein'=>$request->linkdein,
            'currency'=>$request->currency,
            'time_zone'=>$request->time_zone,
            'logo'=>$image_name,
            'footer_logo'=>$footer_logo_name,
            'favicon'=>$favicon_name,
        ]);

        return redirect(route('organization.index'))->with('success','Organization Info Create Successfully');

    }

}
