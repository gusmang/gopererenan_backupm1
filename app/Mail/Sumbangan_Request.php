<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class Sumbangan_Request extends Mailable
{
    use Queueable, SerializesModels;
 
    
    /**
     * Create a new message instance.s
     *
     * @return void
     */
    public function __construct($arr,$email,$invoice)
    {
        // $this->namauser     = $namauser;
        // $this->ntr          = $ntr;
        $this->email                  = $email;
        $this->eminvoiceail           = $invoice;
        $this->requests               = $arr;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
       return $this->from('no-reply@intaro.id')
       ->view('mail.withdraw_pembayaran')
       ->subject("Email Invoice Sumbangan ")
       ->to("info@gopererenan.com")
       ->with(
        [
            // 'namauser'  => $namauser,
            // 'ntr'       => $ntr,
            'email'     => $email,
            'invoice'     => $invoice,
            'request'   => $requests
        ]);
        
        
    }
    
}