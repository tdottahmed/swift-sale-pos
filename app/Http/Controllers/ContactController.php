<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        $contactTypes = ContactType::all();
        return view('contact.index', compact('contacts', 'contactTypes'));
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
        try {
            Contact::create([
                'uuid'             => Str::uuid(),
                "contact_type"     => $request->contact_type,
                "contact_id"       => $request->contact_id,
                "prefix"           => $request->prefix,
                "first_name"       => $request->first_name,
                "middle_name"      => $request->middle_name,
                "last_name"        => $request->last_name,
                "mobile"           => $request->mobile,
                "alternate_number" => $request->alternate_number,
                "landline"         => $request->landline,
                "email"            => $request->email,
                "city"             => $request->city,
                "state"            => $request->state,
                "country"          => $request->country,
                "zip"              => $request->zip,
                "date_of_birth"    => $request->date_of_birth,
                "assigned_to"      => $request->assigned_to,
                "address"          => $request->address,
                "address2"         => $request->address2,
                "business_name"    => $request->business_name,
                "shipping_address" => $request->shipping_address,
            ]);
            return redirect()->back()->with('success', 'Contact created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit-modal', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        try {
            $contact->update([
                "contact_type"     => $request->contact_type,
                "contact_id"       => $request->contact_id,
                "prefix"           => $request->prefix,
                "first_name"       => $request->first_name,
                "middle_name"      => $request->middle_name,
                "last_name"        => $request->last_name,
                "mobile"           => $request->mobile,
                "alternate_number" => $request->alternate_number,
                "landline"         => $request->landline,
                "email"            => $request->email,
                "city"             => $request->city,
                "state"            => $request->state,
                "country"          => $request->country,
                "zip"              => $request->zip,
                "date_of_birth"    => $request->date_of_birth,
                "assigned_to"      => $request->assigned_to,
                "address"          => $request->address,
                "address2"         => $request->address2,
                "business_name"    => $request->business_name,
                "shipping_address" => $request->shipping_address,
            ]);
            return redirect()->back()->with('success', 'Contact Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->back()->with('success', 'Contact Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
