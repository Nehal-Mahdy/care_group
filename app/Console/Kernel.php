<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Order;
use App\Jobs\SendInstallmentReminder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $installments = DB::table('product_payment_plans')
                ->whereDate('pay_when', now()->addDays(3)->toDateString())
                ->get();

            if ($installments->isEmpty()) {
                Log::info('No upcoming installments due in 3 days.');
                return;
            }

            Log::info('Found ' . $installments->count() . ' upcoming installments.');

            foreach ($installments as $installment) {
                $order = Order::where('product_id', $installment->product_id)->first();

                if ($order && $order->customer) {
                    Log::info('Dispatching installment reminder - Order ID: ' . $order->id);
                    SendInstallmentReminder::dispatch($order, $installment)->onQueue('emails');
                } else {
                    Log::warning('No order found for this installment - Product ID: ' . $installment->product_id);
                }
            }
        })->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
