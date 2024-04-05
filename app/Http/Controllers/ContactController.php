<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function index(Request $request)
    {
        $contactTypes = ContactType::all();

        // Map input value to contact type ID
        $typeMap = [
            'supplier' => 1,
            'customer' => 2,
            // Add more mappings as needed
        ];

        // Get the contact type ID based on the input value
        $selectedType = $typeMap[$request->input('type')] ?? null;

        // Fetch contacts based on the selected type from the sidebar
        $contactsQuery = Contact::query();

        if ($selectedType !== null) {
            $contactsQuery->where('contact_type', $selectedType);
        }

        $contacts = $contactsQuery->get();

        return view('contact.index', compact('contacts', 'contactTypes'));
    }


    public function create()
    {
        //
    }

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

   
    public function show(Contact $contact)
    {
        //
    }

    
    public function edit(Contact $contact)
    {
        return view('contact.edit-modal', compact('contact'));
    }

    
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
