<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;
    public $pemilih;
    public $url;
 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pemilih)
    {
        $this->pemilih = $pemilih;
        $this->url = url('verify/'.$pemilih->id.'?signature='.base64_encode($pemilih->email));
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pemilihan Munas Jabar 2019')->view('emails.feedback', compact('pemilih', 'url'));
    }
}
