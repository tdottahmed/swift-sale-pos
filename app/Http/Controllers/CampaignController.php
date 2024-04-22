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
<<<<<<< HEAD
    
=======

    /**
     * Show the form for creating a new resource.
     */
>>>>>>> dade5fc
    public function create()
    {
        //
    }

<<<<<<< HEAD
    public function store(Request $request)
    {
=======
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
>>>>>>> dade5fc
        try {
            $file = $request->file('attachment');
            if ($file) {
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

                Image::make($file)->resize(200, 250)->save(public_path('storage/campaign/' .$file_name));
            }

<<<<<<< HEAD

=======
>>>>>>> dade5fc
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

<<<<<<< HEAD
=======
    /**
     * Display the specified resource.
     */
>>>>>>> dade5fc
    public function show(Campaign $campaign)
    {
        //
    }

<<<<<<< HEAD
=======
    /**
     * Show the form for editing the specified resource.
     */
>>>>>>> dade5fc
    public function edit(Campaign $campaign)
    {
        return view('campaign.edit', compact('campaign'));
    }

<<<<<<< HEAD
=======
    /**
     * Update the specified resource in storage.
     */
>>>>>>> dade5fc
    public function update(Request $request, Campaign $campaign)
    {
        try {
            $file = $request->file('attachment');

            if ($file) {
<<<<<<< HEAD
                
                $path = public_path('storage/campaign/' . $campaign->attachment);
                if ($campaign->attachment && is_file($path)) {
=======
                $path = public_path('storage/campaign/' . $campaign->attachment);
                if (file_exists($path)) {
>>>>>>> dade5fc
                    unlink($path);
                }

                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();

<<<<<<< HEAD
                Image::make($file)->resize(200, 250)->save(public_path('storage/campaign/' .$file_name));
=======
                Image::make($file)->resize(200, 250)->save(public_path('storage/products/' . $file_name));
>>>>>>> dade5fc
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

<<<<<<< HEAD
=======
    /**
     * Remove the specified resource from storage.
     */
>>>>>>> dade5fc
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        return redirect(route('campaign.index'))->with('success', 'Campaign Deleted Successfully');
    }
}
