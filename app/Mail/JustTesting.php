<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JustTesting extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@mailtrap.io')
            ->to('bonjour@mailtrap.io')
            ->cc('hola@mailtrap.io')
            ->subject('Forgot Password')
            ->markdown('auth.forgot-password')
            ->with([
                'name' => 'New Mailtrap User',
                'link' => '/inboxes/'
            ]);

        // return $this->view('view.name');
    }
}
