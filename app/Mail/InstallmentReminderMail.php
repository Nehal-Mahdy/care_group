<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstallmentReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $installment;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, $installment)
    {
        $this->order = $order;
        $this->installment = $installment;
    }

    /**
     * Build the message.
     */

public function build()
{
    return $this->subject('Reminder: Upcoming Installment Payment')
                ->view('emails_installment.installment_reminder')
                ->with([
                    'order' => $this->order,
                    'installment' => $this->installment,
                    'productPaymentPlan' => $this->installment,
                ]);
}
}
