<?php

namespace App\Http\Controllers;

use Dotenv\Dotenv;
use Illuminate\Support\Env;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view organization', ['only' => ['index']]);
        $this->middleware('permission:create organization', ['only' => ['create', 'store']]);
        $this->middleware('permission:update organization', ['only' => ['update', 'edit']]);
        $this->middleware('permission:updateTheme organization', ['only' => ['updateTheme']]);
    }

    public function index()
    {
        return view('organization.index');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token', 'header_logo', 'footer_logo');
        try {
            foreach ($data as $name => $value) {
                Organization::updateOrCreate(['name' => $name], ['value' => $value]);
            }

            if ($request->file('logo') || $request->file('favicon')) {
                if ($request->file('logo')) {
                    $imagePath = uploadImage($request->file('logo'), 'organization');
                    Organization::updateOrCreate(['name' => 'logo'], ['value' => $imagePath]);
                }
                if ($request->file('favicon')) {
                    $imagePath = uploadImage($request->file('favicon'), 'organization');
                    Organization::updateOrCreate(['name' => 'favicon'], ['value' => $imagePath]);
                }
            }
            return redirect()->route('organization.index')->with('success', 'Organization Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage())->withInput();
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
            return redirect()->back()->with('success', 'Application Set up Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
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
            return redirect()->back()->with('success', 'Application Set up Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"' . trim($val) . '"';
            $envContent = file_get_contents($path);
            if (preg_match("/\b{$type}\b/", $envContent)) {
                $envContent = preg_replace("/\b{$type}\b=.*/", "{$type}={$val}", $envContent);
            } else {
                $envContent .= "\n{$type}={$val}";
            }
            file_put_contents($path, $envContent);
        }
    }

    // public function updateLogo(Request $request)
    // {
    //     $logo = Organization::where('name', 'logo')->first();
    //     $favicon = Organization::where('name', 'favicon')->first();
    //     if ($request->file('logo')) {
    //         try {
    //             $imagePath = uploadImage($request->file('image_' . Str::random(5)), 'organization/images');
    //             $logo->update(['value' => $imagePath]);
    //         } catch (\Exception $e) {
    //             Session::flash('error', 'Logo update failed: ' . $e->getMessage());
    //             return back();
    //         }
    //     } elseif ($request->file('favicon')) {
    //         try {
    //             $imagePath = uploadImage($request->file('favicon'), 'organization/images');
    //             $favicon->update(['value' => $imagePath]);
    //         } catch (\Exception $e) {
    //             Session::flash('error', 'Favicon update failed: ' . $e->getMessage());
    //             return back();
    //         }
    //     }
    // }
}
