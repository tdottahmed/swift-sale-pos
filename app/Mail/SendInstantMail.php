<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInstantMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $attachment;
    public $recipientFirstName; 

    /**
     * Create a new message instance.
     *
     * @param string $subject
     * @param string $body
     * @param mixed $recipientFirstName
     * @param mixed $attachment
     */
    public function __construct($subject, $body, $recipientFirstName, $attachment = null)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->attachment = $attachment;
        $this->recipientFirstName  = $recipientFirstName ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->subject)->view('contact.send-instant-mail')->with(['body' => $this->body, 'recipientFirstName'=>$this->recipientFirstName ]);        
        if ($this->attachment instanceof \Illuminate\Http\UploadedFile) {
            $attachmentPath = $this->attachment->getRealPath();
            $attachmentName = $this->attachment->getClientOriginalName();
            $attachmentMime = $this->attachment->getMimeType();
            
            $mail->attach($attachmentPath, [
                'as' => $attachmentName,
                'mime' => $attachmentMime,
            ]);
        }
        
        return $mail;
    }
}
