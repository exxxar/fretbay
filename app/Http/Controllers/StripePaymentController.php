<?php

namespace App\Http\Controllers;

use App\Enums\NotificationObjectType;
use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Mail\RegistrationMail;
use App\Mail\SuccessPayedMail;
use App\Models\Listing;
use App\Models\PaymentHistory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

use Stripe\Event;
use Stripe\Stripe;
use Stripe\Webhook;

class StripePaymentController extends Controller
{

    public function index(Request $request)
    {
        return response()->json([
            "payments" => PaymentHistory::where("user_id", Auth::user()->id)->paginate(30)
        ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request, $id)
    {
        $payment = PaymentHistory::find($id);

        if (is_null($payment))
            return view("errors.stripe", ["message" => "Payment not found"]);

        if ($payment->success == true)
            return redirect()->route("single.page", ["payment", $id]);


        return view('stripe', ["payment" => $payment]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $request->validate([
            "payment_id" => "required"
        ]);

        $payment = PaymentHistory::find($request->payment_id);

        if (is_null($payment))
            return view("errors.stripe");


        $description = "Quote payment from ALLOTRANS.com for #$payment->user_id user";

        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            "amount" => $payment->amount * 100,
            "currency" => $payment->currency,
            "source" => $request->stripeToken,
            "description" => $description
        ]);

        $payment->description = $description;
        $payment->source = $request->stripeToken;
        $payment->type = "card";
        $payment->success = true;
        $payment->save();

        $listing = Listing::find($payment->listing_id);
        $listing->status = "payed";
        $listing->is_active = false;
        $listing->save();

        $user = User::find($payment->user_id);

        event(new NotificationEvent(
            "Payment",
            $description,
            NotificationType::Info,
            Auth::user()->id,
            $payment->id,
            NotificationObjectType::Payment
        ));

        if (!is_null($user->email))
            Mail::to($user->email)
                ->send(new SuccessPayedMail(
                    $payment
                ));

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function callback(Request $request)
    {
        Log::info("callback");


        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $event = Webhook::constructEvent(
                $payload, $sig_header, "whsec_N0q7eDZQtsSxyQWNbkrK6Rx3Vu4jnWL4" //endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            Log::info("Invalid payload");
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature

            Log::info("Invalid signature");
            http_response_code(400);
            exit();
        }


        echo 'Received unknown event type ' . $event->type;

        http_response_code(200);

    }
}
