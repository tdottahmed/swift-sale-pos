<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    public function index()
    {
        $contactTypes = ContactType::all();
        return view('contact-type.index', compact('contactTypes'));
    }

    public function store(Request $request)
    {
        try {
            ContactType::create([
                'uuid'        => Str::uuid(),
                "title"       => $request->title,
                "description" => $request->description,
            ]);
            return redirect()->back()->with('success', 'Contact Type created Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function show(ContactType $contactType)
    {
        //
    }

    public function edit(ContactType $contactType)
    {
        return view('contact-type.edit',compact('contactType'));
    }

    public function update(Request $request, ContactType $contactType)
    {
        try {
            $contactType->update([
                "title"       => $request->title,
                "description" => $request->description,
            ]);
            return redirect(route('contact-type.index'))->with('success', 'Contact Type Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(ContactType $contactType)
    {
        $contactType->delete();

        return redirect(route('contact-type.index'))->with('success', 'Contact Type Deleted Successfully');
    }
}
