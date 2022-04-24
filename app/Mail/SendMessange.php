<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessange extends Mailable
{
    use Queueable, SerializesModels;

    protected $user_id;
    protected $name;
    protected $email;
    protected $message;

    public function __construct($user_id, $name, $email, $message)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->from('auto_reply@smartcomics.ru')
            ->view('mails.send_messange')
            ->text('mails.send_messange_txt')
            ->with(
                [
                    'user_id' => $this->user_id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'message_from_site' => $this->message,
                ]
            )
            ->subject('Сообщение с сайта SmartComics.ru ' 
            . date('Y-m-d H:i:s')
            );
    }
}
