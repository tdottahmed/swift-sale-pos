<?php

namespace App\Http\Controllers;

use Dotenv\Dotenv;
use Illuminate\Support\Env;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view organization', ['only' => ['index']]);
        $this->middleware('permission:create organization', ['only' => ['create','store']]);
        $this->middleware('permission:update organization', ['only' => ['update','edit']]);
        $this->middleware('permission:updateTheme organization', ['only' => ['updateTheme']]);
    }
    
    public function index()
    {
        $organizations = Organization::get();
        return view('organization.index', compact('organizations'));
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {

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

        if ($image) {
            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, 250)->save(public_path('storage/organization/' . $image_name));
        }
        if ($footer_logo) {
            $footer_logo_name = uniqid() . '.' . $footer_logo->getClientOriginalExtension();

            Image::make($footer_logo)->resize(200, 250)->save(public_path('storage/organization/' . $footer_logo_name));
        }
        if ($favicon) {
            $favicon_name = uniqid() . '.' . $favicon->getClientOriginalExtension();

            Image::make($favicon)->resize(200, 250)->save(public_path('storage/organization/' . $favicon_name));
        }


        Organization::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'favicon' => $request->favicon,
            'email' => $request->email,
            'phone' => $request->phone,
            'telephone_no' => $request->telephone_no,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'skype' => $request->skype,
            'linkdein' => $request->linkdein,
            'currency' => $request->currency,
            'time_zone' => $request->time_zone,
            'logo' => $image_name,
            'footer_logo' => $footer_logo_name,
            'favicon' => $favicon_name,
        ]);

        return redirect(route('organization.index'))->with('success', 'Organization Info Create Successfully');
    }
    public function edit(Organization $organization)
    {

        return view('organization.edit', compact('organization'));
    }


    public function update(Organization $organization, Request $request)
    {
        $image = $request->file('logo');
        $footer_logo = $request->file('footer_logo');
        $favicon = $request->file('favicon');

        if ($image) {
            $path = public_path('storage/organization/' . $organization->logo);
            if (is_file($path)) {
                unlink($path);
            }

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, 250)->save(public_path('storage/organization/' . $image_name));
        } else {
            $image_name = $organization->logo;
        }

        if ($footer_logo) {
            $path = public_path('storage/organization/' . $organization->footer_logo);
            if (is_file($path)) {
                unlink($path);
            }

            $footer_logo_name = uniqid() . '.' . $footer_logo->getClientOriginalExtension();

            Image::make($footer_logo)->resize(200, 250)->save(public_path('storage/organization/' . $footer_logo_name));
        } else {
            $footer_logo_name = $organization->footer_logo;
        }

        if ($favicon) {
            $path = public_path('storage/organization/' . $organization->favicon);
            if (is_file($path)) {
                unlink($path);
            }

            $favicon_name = uniqid() . '.' . $favicon->getClientOriginalExtension();

            Image::make($favicon)->resize(200, 250)->save(public_path('storage/organization/' . $favicon_name));
        } else {
            $favicon_name = $organization->favicon;
        }

        $organization->update([
            'title' => $request->title,
            'favicon' => $request->favicon,
            'email' => $request->email,
            'phone' => $request->phone,
            'telephone_no' => $request->telephone_no,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'skype' => $request->skype,
            'linkdein' => $request->linkdein,
            'currency' => $request->currency,
            'time_zone' => $request->time_zone,
            'logo' => $image_name,
            'footer_logo' => $footer_logo_name,
            'favicon' => $favicon_name,
        ]);

        return redirect(route('organization.index'))->with('success', 'Product Updated Successfully');
    }

    public function updateTheme(Request $request)
    {
        try {
            $user = auth()->user()->personalizeSettings;
            $user->update([
                'theme' => $request->theme
            ]);
            return redirect()->back()->with('success', 'Theme Switched Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went Wrong');
        }
    }

    public function createSmtp()
    {
        return view('organization.create-smtpServer');
    }
    public function storeSmtp(Request $request)
    {
        try {
            foreach ($request->types as $type) {      
                $this->overWriteEnvFile($type, $request->$type);
            }
            Artisan::call('optimize:clear');
            return redirect()->back()->with('success','Application Set up Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error',$th->getMessage());            
        }
    }
    public function createSmsGateway()
    {
        return view('organization.create-smsGateway');
    }
    public function storeSmsGateway(Request $request)
    {
        try {
            foreach ($request->types as $type) {      
                $this->overWriteEnvFile($type, $request->$type);
            }
            Artisan::call('optimize:clear');
            return redirect()->back()->with('success','Application Set up Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error',$th->getMessage());            
        }
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            $envContent = file_get_contents($path);
            if (preg_match("/\b{$type}\b/", $envContent)) {
                $envContent = preg_replace("/\b{$type}\b=.*/", "{$type}={$val}", $envContent);
            } else {
                $envContent .= "\n{$type}={$val}";
            }
            file_put_contents($path, $envContent);
        }
    }

}
