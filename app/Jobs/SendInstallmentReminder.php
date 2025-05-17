<?php

namespace App\Jobs;

use App\Models\Order;
use App\Mail\InstallmentReminderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendInstallmentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;
    protected $installment;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order, $installment)
    {
        $this->order = $order;
        $this->installment = $installment;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        if ($this->order->customer) {
            Log::info('Sending email to: ' . $this->order->customer->email);
            Mail::to($this->order->customer->email)
                ->send(new InstallmentReminderMail($this->order, $this->installment));
        } else {
            Log::error('Customer not found for order ID: ' . $this->order->id);
        }
    }

}
