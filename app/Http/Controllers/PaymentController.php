<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{

    public function __construct() {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function create(Appointment $appointment)
    {
        $paymentData = [
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => ['name' => $appointment->service->type],
                    'unit_amount' => $appointment->service->price * 100
                ]
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['appointment' => $appointment->id], true),
            'cancel_url' => route('payment.cancel', ['appointment' => $appointment->id], true)
        ];

        $session = Session::create($paymentData);

        return redirect($session->url);
    }

    public function success()
    {
        return redirect(route('appointment.index'))
            ->with('message', 'Pagamento realizado com sucesso.');
    }
        
    public function cancel(Appointment $appointment)
    {
        return redirect(route('appointment.confirm', ['appointment' => $appointment->id]))
            ->with('message', 'Pagamento cancelado.');
    }
}