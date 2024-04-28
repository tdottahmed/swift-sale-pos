<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Support\Str;
use App\Services\SmsService;
use Illuminate\Http\Request;
use App\Mail\SendInstantMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function index(Request $request)
    {
        $contactTypes = ContactType::all();
        $typeMap = [
            'supplier' => 1,
            'customer' => 2,
        ];
        $selectedType = $typeMap[$request->input('type')] ?? null;
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
        return view('contact.show', compact('contact'));
    }


    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        // dd($request->all());
        try {
            
            $contact->update($request->all());
            return redirect(route('contacts.index'))->with('success', 'Contact Updated Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
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

    public function composeEmail(Contact $contact)
    {
        return view('contact.compose-email', compact('contact'));
    }

    public function sendEmail(Request $request)
    {
        try {
            $subject = $request->subject;
            $to = $request->to;
            $body = $request->body;
            $recipientFirstName = $request->recipientFirstName;
            $cc = $request->cc ? $request->cc : null;
            $bcc = $request->bcc ? $request->bcc : null;
            $mail = new SendInstantMail($subject, $body, $recipientFirstName);

            if ($request->hasFile('attachment')) {
                $attachment = $request->file('attachment');
                $attachmentName = uniqid() . '_' . $attachment->getClientOriginalName();
                $attachmentPath = $attachment->storeAs('public/attachments', $attachmentName);

                $attachmentFullPath = public_path('storage/attachments/' . $attachmentName);

                $mail->attach($attachmentFullPath, [
                    'as' => $attachmentName,
                    'mime' => $attachment->getMimeType(),
                ]);
            }
            Mail::to($to)->send($mail);
            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
    }

    public function composeSms(Contact $contact)
    {
        return view('contact.compose-sms', compact('contact'));
    }

    public function sendSms(Request $request)
    {
        $body = $request->body;
        $to = $request->to;
        $greeting = "Hello Mr/Mrs " . $request->recipientFirstName;
        $salutationBefore = "Regards,";
        $salutationAfter = "Team " . env('APP_NAME');
        $message = $greeting . "\n\n" . $body . "\n\n" . $salutationBefore . "\n" . $salutationAfter;
        if ($this->smsService->sendSms($to, $message)) {
            return redirect()->back()->with('success', 'SMS Sent Successfully!');
        } else {
            return redirect()->back()->with('error', 'Something Went wrong, Please check your twilio credentials!');
        }
    }
}
