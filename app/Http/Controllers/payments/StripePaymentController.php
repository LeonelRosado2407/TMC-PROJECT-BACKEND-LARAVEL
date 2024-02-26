<?php

namespace App\Http\Controllers\payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('pages.payment.stripe.payment');
    }

    public function makePayment(Request $request)
    {
        //set stripe secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Test payment from itsolutionstuff.com.'
            ]);
            return view('pages.payment.stripe.payments-success');
        } catch (\Exception $ex) {
            return $ex->getMessage(); // Manejo de errores, puedes redirigir a una página de error.
        }
    }
}
