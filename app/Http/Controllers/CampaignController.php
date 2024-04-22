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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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

    /**
     * Display the specified resource.
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campaign $campaign)
    {
        return view('campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campaign $campaign)
    {
        try {
            $file = $request->file('attachment');

            if ($file) {
                $path = public_path('storage/campaign/' . $campaign->attachment);
                if (file_exists($path)) {
                    unlink($path);
                }

                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

                Image::make($file)->resize(200, 250)->save(public_path('storage/products/' . $file_name));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect(route('campaign.index'))->with('success', 'Campaign Deleted Successfully');
    }
}
