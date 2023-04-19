<?php
 
namespace App\Mail;
 
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
 
class Confirm_Withdraw_Request extends Mailable
{
    use Queueable, SerializesModels;
 
    
    /**
     * Create a new message instance.s
     *
     * @return void
     */
    public function __construct($arr,$email)
    {
        // $this->namauser     = $namauser;
        // $this->ntr          = $ntr;
        $this->email           = $email;
        $this->arr             = $arr;
    }
 
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
       return $this->from('no-reply@gopererenan.com')
       ->view('front.mail.punia_reminder')
       ->subject("Email Punia GoPererenan")
       ->to($this->email)
       ->with(
        [
            // 'namauser'  => $namauser,
            // 'ntr'       => $ntr,
            'email'     => $this->email,
            'arr'       => $this->arr
        ]);
        
        
    }
    
}