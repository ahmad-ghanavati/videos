<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
         $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.verify-email')->with([
        //     'url'=>'http:/google.com'
        // ]);
        return $this->html((new MailMessage)
        ->greeting("با احترام و سلام فراوان به احمد جان")
        ->line('همکار گرامی ')
        ->action('verify your email','http://ahmadGhanavati.com')
        ->render()
    );
       
    }
}
