<?php

namespace App\Console\Commands;

use App\Mail\UnpaidOrderReminder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendUnpaidOrderReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:unpaid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email to all users who have orders with open or partial status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::query()
                            ->whereIn('status',['open','partial'])                            
                            ->orderBy('user_id','desc')
                            ->get();        
        
        foreach ($orders as $order) {
            $this->sendReminderEmail($order);
        }        
    }

    private function SendReminderEmail($order)
    {
        // $user = User::find($order->user_id);        
        Mail::to($order->user->email)->send(new UnpaidOrderReminder());
    }
}
