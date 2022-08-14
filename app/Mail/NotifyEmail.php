<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $detailes; //array ['title'=>'progrmming','body => 'php']
    public function __construct($data)
    {
       $this-> detailes = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view(view:'emails.emailuser');

       // return $this->view('emails.mailuser');

       // return view('welcome')->with('detailes','basel','ahmed ','ali');
    }
}
