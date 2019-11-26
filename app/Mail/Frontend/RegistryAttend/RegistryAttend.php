<?php

namespace App\Mail\Frontend\RegistryAttend;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact.
 */
class RegistryAttend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Request
     */
    public $attend;

    /**
     * SendContact constructor.
     *
     * @param \App\Models\RegistryAttend $attend
     */
    public function __construct(\App\Models\RegistryAttend $attend)
    {
        $this->attend = $attend;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->to(config('mail.from.address'), config('mail.from.name'))
            ->view('frontend.mail.contact')
            ->text('frontend.mail.contact-text')
            ->subject(__('strings.emails.contact.subject', ['app_name' => app_name()]))
            ->from($this->attend->email, $this->attend->name)
            ->replyTo($this->attend->email, $this->attend->name);

        if($this->attend->hasFile())
        {
            $files = $this->attend->files;

            foreach ($files as $file)
            {
                $mail->attach(public_path('/').$file->getUrl());
            }
        }

        return $mail;
    }
}
