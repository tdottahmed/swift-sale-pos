<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Campaign;
use App\Models\ContactType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Jobs\SendCampaignEmail;
use App\Jobs\SendCampaignSms;
use App\Services\SmsService;
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
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        
        try {
            $contactTypeId = (int) $request->contact_type_id;
            $contacts = ContactType::find($contactTypeId);
            $file = $request->file('attachment');
            if ($file) {
                $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
                Image::make($file)->resize(200, 250)->save(public_path('storage/campaign/' .$file_name));
            }
            $campaignData = $request->all();
            $campaignData['uuid'] = Str::uuid();
            $campaign = Campaign::create($campaignData);
            $campaign->contacts()->attach($contacts->contact);
            return redirect()->back()->with('success', 'campaign created Successfully');
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
                "campaign_type" => $request->campaign_type,
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

    public function sendEmail(Campaign $campaign)
    {
        try {
            SendCampaignEmail::dispatch($campaign);
            return redirect()->back()->with('success', 'Campaign email has been queued Successfully!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!!');
        }
    }
    public function sendSms(Campaign $campaign)
    {      
        try {
            SendCampaignSms::dispatch($campaign);
            return redirect()->back()->with('success', 'Campaign SMS Sending has been queued Successfully!!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong!!');
        }
    }    
}
