<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

use Stripe\Event;
use Stripe\Stripe;

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
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $events = Event::all([
            'type' => 'checkout.session.async_payment_succeeded',
            'created' => [
                // Check for events created in the last 2 hours.
                'gte' => time() - 7200,
            ],
        ]);


        foreach ($events->autoPagingIterator() as $event) {
            $pay = $event->data->object;

            Log::info($event->data->object->client_reference_id);
            Log::info($pay);
/*
            if (intval($event->data->object->client_reference_id) == $user->id) {

                $user->premium = 1;
                $user->save();

                break;
            }*/
        }

        return response()->noContent();
    }
}
