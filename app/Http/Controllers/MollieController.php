<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationPaymentConfirmation;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Registration;
use App\Services\RegistrationManager;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MollieController extends Controller
{
    public function  __construct()
    {
        $mollieKey = config('services.mollie.key');
        Mollie::api()->setApiKey($mollieKey); // your mollie test api key
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function preparePayment()
    {
        // dd(request()->all());        

        $payment = Mollie::api()->payments()->create([
            'amount'        => [
                'currency'      => 'EUR', // Type of currency you want to send
                'value'         => request()->amount, // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description'   => request()->title,
            'redirectUrl'   => route('payment.status'),
            'webhookUrl'    => route('webhooks.mollie'),
            "metadata"      => [
                "name"  =>   request()->name,
                "email" =>   request()->email,
            ],
        ]);

        DB::transaction(function () use ($payment){
            $payment = Mollie::api()->payments()->get($payment->id);

            $order = Order::create([
                'user_id'   => request()->user,
                'method'    => 'credit-card',
                'subtotal'  => request()->subtotal ?? 0,
                'discount'  => request()->discount ?? 0,
                'total'     => request()->total ?? 0,
                'status'    => 'open',
            ]);

            if (request()->courses) {
                $order->courses()->attach(request()->courses);
                foreach (request()->courses as $id) {
                    $registration = Registration::where('course_id', $id)
                        ->where('user_id', request()->user)
                        ->where('role', 'student')
                        ->first();
                    $order->registrations()->save($registration);
                    //RegistrationPaymentManager::registrationToOpen($registration->id);
                }
                //$order->subtotal_amount = OrderPriceCalculator::getSubtotal($order->user_id, $order->courses);
                //$order->total_amount = OrderPriceCalculator::getTotal(count($request->courses), $order->subtotal,$order->method);
                //$order->status = 'open';
            }

            $user_payment = Payment::create([
                'code'              => Str::random(15),
                'provider'          => 'mollie',
                'method'            => 'credit-card',
                'amount'            => request()->amount,
                'currency'          => 'EUR',
                'molley_payment_id' => $payment->id,
                'status'            => 'open',
                'done'              => now(),
                'user_id'           => auth()->user()->id,
                'comments'          => request()->title,
            ]);

            $user_payment->order()->associate($order->id)->save();            
            // redirect customer to Mollie checkout page            
        });
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return Response
     */
    public function paymentSuccess()
    {
        $pay = Payment::latest()->first();
        $mollie = Mollie::api()->payments()->get($pay->molley_payment_id);

        if ($mollie->isPaid()) {
            $pay->status = 'paid';            
            $pay->save();
            
            $status = RegistrationManager::updateOrder($pay->order_id);
            
            // Mail::to(auth()->user()->email)->send(new RegistrationPaymentConfirmation($status)); 
        
            session()->flash('success', 'Payment saved successfully.');
            
            return view('payments.status');
        } else {
            echo 'Payment Error';
        }
    }

    public function handle(Request $request) {
        
        if (! $request->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($request->id);

        dd($payment);

        if ($payment->isPaid()) {
            return "No se pudo";
            return view('payments.status');
            //auth()->user()->setRegistrationStatus()
            //$course->students()->attach(auth()->user()->id, ['role'=>'student', 'status'=>'pending', 'created_at'=> now()]);
        }

        if ($payment->isFailed()) {
            return "No se pudo";
        }

        if ($payment->isExpired()) {
            return "Expiro esta mierda";
        }

        if ($payment->isExpired()) {
            return "Expiro esta mierda";
        }

        if ($payment->isCanceled()) {
            return "se cancelo lo que se dijo";
        }

        if ($payment->isOpen()) {
            return "Abierto";
        }
    }
}


