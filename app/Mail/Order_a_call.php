<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class Order_a_call extends Mailable
{
    use Queueable, SerializesModels;
     
    protected $your_name;
    protected $phone;
 
    public function __construct($your_name, $phone)
    {
        $this->your_name = $your_name;
        $this->phone = $phone;
    }

    public function build()
    {

        return $this->from('a.otvetchik@rembyt7.ru')
                    ->view('mails.order_a_call')
                    ->text('mails.order_a_call_txt')
                    ->with(
                      [
                            'your_name' => $this->your_name,
                            'phone' => $this->phone,
                      ])
                      ->subject('Заказ звонка '.date('Y-m-d H:i:s').' через сайт rembyt7.ru')
                      ;
    }
}