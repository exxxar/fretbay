<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

use Stripe\Event;
use Stripe\Stripe;
use Stripe\Webhook;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
       Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
            "amount" => 100 * 100,
            "currency" => "EUR",
            "source" => $request->stripeToken,
            "description" => "Test payment from ALLOTRANS.com"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function callback(Request $request){
        Log::info("callback");
        $endpoint_secret = 'whsec_sXm4SHND4GB3oEnSUMMMzXrDEF68m7J3';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }


        echo 'Received unknown event type ' . $event->type;

        http_response_code(200);

    }
}
