<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->data;
        return $this->from('example@example.com', 'Example')
                ->view('Mail.OrderMailToAdmin')->with([
                    'user_email' => $data['user_email'],
                    'product_id'=>$data['product_id'],
                    'price'=>$data['price'],
                    'quantity' => $data['quantity']
                    
                ]);
    }
}