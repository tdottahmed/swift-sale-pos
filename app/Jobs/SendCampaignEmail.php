<?php

namespace App\Jobs;

use App\Models\Campaign;
use App\Mail\SendInstantMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Facades\Mail;

class SendCampaignEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campaign;

    /**
     * Create a new job instance.
     *
     * @param Campaign $campaign
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contacts = $this->campaign->contacts()->get();
        foreach ($contacts as $contact) {
            $subject = $this->campaign->title; 
            $body =  $this->campaign->body;
            $recipientFirstName = $contact->first_name; 
            $attachment = null;
            $cc = $this->campaign->cc ?? null;
            $bcc = $this->campaign->bcc ?? null;
            $mail = new SendInstantMail($subject, $body, $recipientFirstName, $attachment, $cc, $bcc);
            Mail::to($contact->email)->send($mail);
        }
        Log::info('Campaign emails sent successfully!');
    }
}
