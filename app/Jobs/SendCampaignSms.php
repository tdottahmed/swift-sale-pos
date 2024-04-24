<?php

namespace App\Jobs;

use App\Models\Campaign;
use App\Services\SmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendCampaignSms implements ShouldQueue
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
        $body = $this->campaign->body;
        $salutationBefore = "Regards,";
        $salutationAfter = "Team " . env('APP_NAME');

        foreach ($contacts as $contact) {
            $to = $contact->mobile; 
            $greeting = "Hello Mr/Mrs " . $contact->first_name;
            $message = $greeting . "\n\n" . $body . "\n\n" . $salutationBefore . "\n" . $salutationAfter;
            $smsService = new SmsService();
            $smsService->sendSms($to, $message);
        }
        Log::info('Campaign SMS messages sent successfully!');
    }
}
