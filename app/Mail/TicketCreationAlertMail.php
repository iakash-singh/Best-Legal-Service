<?php

namespace App\Mail;

use App\Models\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketCreationAlertMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $getSrvName = Service::select('ser_name')->where('id', $this->details['service'])->first();
        return $this->subject('[#'. $this->details['ticket'].'] New Ticket raised : '. $getSrvName->ser_name.'')->view('front.customer.TicketCreateAlertMail')->with(['details' => $this->details, 'srvName' => $getSrvName]);
    }
}
