<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaign.index', compact('campaigns'));
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $file = $request->file('attachment');
            if ($file) {
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

                Image::make($file)->resize(200, 250)->save(public_path('storage/campaign/' .$file_name));
            }


            Campaign::create([
                'uuid'        => Str::uuid(),
                "title"       => $request->title,
                "description" => $request->description,
                "body" => $request->body,
                "attachment" => $file_name,
                "campagin_type" => $request->campagin_type,
            ]);
            return redirect()->back()->with('success', 'Campagin created Successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function show(Campaign $campaign)
    {
        //
    }

    public function edit(Campaign $campaign)
    {
        return view('campaign.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        try {
            $file = $request->file('attachment');

            if ($file) {
                
                $path = public_path('storage/campaign/' . $campaign->attachment);
                if ($campaign->attachment && is_file($path)) {
                    unlink($path);
                }

                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

                Image::make($file)->resize(200, 250)->save(public_path('storage/campaign/' .$file_name));
            } else {
                $file_name = $campaign->attachment;
            }

            $campaign->update([
                "title"       => $request->title,
                "description" => $request->description,
                "body" => $request->body,
                "attachment" => $file_name,
                "campagin_type" => $request->campagin_type,
            ]);
            return redirect(route('campaign.index'))->with('success', 'Campaign Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect(route('campaign.index'))->with('success', 'Campaign Deleted Successfully');
    }
}
