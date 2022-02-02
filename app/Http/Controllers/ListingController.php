<?php

namespace App\Http\Controllers;

use App\Classes\MapBoxAPIManager;
use App\Enums\NotificationObjectType;
use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Events\NotificationEventBroadcast;
use App\Events\NotificationQuoteEventBroadcast;
use App\Mail\AcceptQuoteMail;
use App\Mail\DeclineQuoteMail;
use App\Mail\NewMessageMail;
use App\Mail\NotifyMail;
use App\Mail\RegistrationMail;
use App\Mail\SendQuoteMail;
use App\Models\Message;
use App\Models\Listing;
use App\Models\PaymentHistory;
use App\Models\Quote;
use App\Notifications\SendPushNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Kutia\Larafirebase\Facades\Larafirebase;

class ListingController extends Controller
{

    protected $mapbox;

    public function __construct()
    {
        $this->mapbox = new MapBoxAPIManager();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $listings = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])
            ->where("is_active", true)
            ->where("status", "")
            ->whereDate("expiration_date", ">=", Carbon::now())
            ->orderByDesc('created_at')
            ->paginate(100);
        return response()->json([
            'listings' => $listings
        ]);
    }

    public function loadActive()
    {
        $listings = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])
            ->where('is_active', true)
            ->where("user_id", Auth::user()->id)
            ->whereDate("expiration_date", ">=", Carbon::now())
            ->orderByDesc('expiration_date')
            ->paginate(15);

        return response()->json([
            'listings' => $listings
        ]);
    }


    public function loadArchive()
    {

        $listings = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])
            ->where(function ($q) {
                $q->orWhereDate("expiration_date", "<", Carbon::now())
                    ->orWhere('is_active', false);

            })
            ->where("user_id", Auth::user()->id)
            ->orderByDesc('expiration_date')
            ->paginate(15);

        return response()->json([
            'listings' => $listings
        ]);
    }

    public function loadRemoved()
    {

        $listings = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])
            ->withTrashed()
            ->whereNotNull("deleted_at")
            ->where("user_id", Auth::user()->id)
            ->orderByDesc('deleted_at')
            ->paginate(15);

        return response()->json([
            'listings' => $listings
        ]);
    }

    public function addToArchive($id)
    {

        $user_id = Auth::user()->id;

        $listing = Listing::where("id", $id)
            ->where("user_id", $user_id)
            ->first();

        if (is_null($listing))
            return response()->json([
                "message" => "Error!"
            ], 404);


        $listing->is_active = false;
        $listing->save();

        event(new NotificationEvent(
            __('notifications.listing.title'),
            __('notifications.listing.archive',
                [
                    'listing' => $listing->id,
                    "user" => Auth::user()->id
                ]),
            NotificationType::Warning,
            Auth::user()->id));

        return response()->noContent();
    }


    public function filtered(Request $request)
    {
        $date_from = isset($request->date_from) ? Carbon::createFromTimestamp($request->date_from) : null;
        $date_to = isset($request->date_to) ? Carbon::createFromTimestamp($request->date_to) : null;

        $address_to = json_decode($request->address_to) ?? null;
        $address_from = json_decode($request->address_from) ?? null;
        $volume_range_value = ($request->volume_range_value) ?? null;
        $distance_range_value = ($request->distance_range_value) ?? null;
        $publication_time_range_value = ($request->publication_time_range_value) ?? null;
        $only_self = $request->only_self;
        $moving_package = $request->formula;
        $reference = intval($request->reference) ?? null;
        $region = $request->region ?? null;
        $postal = $request->postal ?? null;

        $listings = Listing::with(['category', 'subcategory', 'thing', 'messages', 'quotes'])
            ->where("status", "");

        if (count($distance_range_value) > 0)
            $listings = $listings->whereBetween("distance", $distance_range_value);

        if (!is_null($reference) && $reference > 0)
            $listings = $listings->where("id", $reference);

        if (!is_null($region))
            $listings = $listings
                ->where(function ($query) use ($region) {
                    $query->orWhere('place_of_loading->id', ((object)$region)->id)
                        ->orWhere('place_of_delivery->id', ((object)$region)->id)
                        ->orWhere('place_of_loading->context', 'like', "%" . ((object)$region)->id . "%")
                        ->orWhere('place_of_delivery->context', 'like', "%" . ((object)$region)->id . "%");
                });
        //->where("place_of_loading->id", ((object)$region)->id)
        //->orWhere("place_of_delivery->id", ((object)$region)->id);


        if (!is_null($postal))
            $listings = $listings
                ->where(function ($query) use ($postal) {
                    $query->orWhere('place_of_loading->postal', $postal)
                        ->orWhere('place_of_delivery->postal', $postal);
                });

        if ($only_self)
            $listings = $listings->where("user_id", $request->user_id);

        if (count($volume_range_value) > 0)
            $listings = $listings->whereBetween("summary_volume", $volume_range_value);

        if (count($publication_time_range_value) > 0)
            $listings = $listings->whereBetween("updated_at",
                [
                    Carbon::now()->subDays($publication_time_range_value[1]),
                    Carbon::now()->subDays($publication_time_range_value[0])
                ]);

        if (!is_null($date_from))
            $listings = $listings->whereDate("shipping_date_from", ">", $date_from)
                ->orWhereDate("unshipping_date_from", ">", $date_from);

        if (!is_null($date_to))
            $listings = $listings->whereDate("shipping_date_to", "<", $date_to)
                ->orWhereDate("unshipping_date_to", "<", $date_to);

        if (!is_null($address_from))
            $listings = $listings->where("place_of_loading->place_name", $address_from->place_name);

        if (count((array)$moving_package) > 0)
            $listings = $listings->whereIn("moving_package", $moving_package);

        if (!is_null($address_to))
            $listings = $listings->where("place_of_delivery->place_name", $address_to->place_name);


        if (count((array)$request->categories) > 0)
            $listings = $listings->whereIn("category_id", $request->categories);

        $listings = $listings
            ->whereDate("expiration_date", ">=", Carbon::now())
            ->orderByDesc('created_at')->paginate(100);

        return response()->json([
            'listings' => $listings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {


        $place_of_loading = $request->get('place_of_loading');
        $place_of_delivery = $request->get('place_of_delivery');
        $volume_items = $request->get('volume_items');

        $user_id = $request->get('user_id') ?? null;



        $listing = Listing::create([
            'title' => $request->get('title') ?? '',
            'articles' => ($request->get('articles')) ?? json_encode([]),
            'place_of_loading' => $place_of_loading,
            'place_of_delivery' => $place_of_delivery,
            'shipping_date_from' => Carbon::createFromTimestampUTC(intval($request->get('shipping_date_from')) / 1000),
            'shipping_date_to' => Carbon::createFromTimestampUTC(intval($request->get('shipping_date_to')) / 1000),
            'unshipping_date_from' => Carbon::createFromTimestampUTC(intval($request->get('unshipping_date_from')) / 1000),
            'unshipping_date_to' => Carbon::createFromTimestampUTC(intval($request->get('unshipping_date_to')) / 1000),
            'additional_info' => $request->get('additional_info') ?? '',
            'moving_package' => $request->get('moving_package') ?? '',
            'images' => json_encode([]),
            'status' => $request->get('status') ?? '',
            'distance' => round($this->mapbox->getAPI()->getDistanceOSM(
                    $place_of_loading->center[0] ?? 0,
                    $place_of_loading->center[1] ?? 0,
                    $place_of_delivery->center[0] ?? 0,
                    $place_of_delivery->center[1] ?? 0
                ) / 1000),

            'is_active' => true,
            'expiration_date' => Carbon::createFromTimestampUTC(intval($request->get('shipping_date_to')) / 1000),
            'category_id' => $request->get('category_id') ?? null,
            'subcategory_id' => $request->get('subcategory_id') ?? null,
            'thing_id' => $request->get('thing_id') ?? null,
            'user_id' => $user_id,
            'summary_volume' => $request->get('summary_volume') ?? 0,
            'volume_items' => $volume_items??json_encode([]),
        ]);

        event(new NotificationEvent(
            __('notifications.listing.title'),
            __('notifications.listing.add', [
                "listing" => $listing->id,
                "user" => $user_id
            ]),
            NotificationType::Info,
            $user_id,
            $listing->id,
            NotificationObjectType::Listing
        ));


        $images = [];
        $path = '/listings/listing' . $listing->id;
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }
        $files = $request->file('images');
        if ($request->hasFile('images')) {
            foreach ($files as $key => $file) {
                $name = $file->getClientOriginalName();
//                $ext = $file->getClientOriginalExtension();
                $file->storeAs("/public", $path . '/' . $name);
                $url = Storage::url('listings/listing' . $listing->id . "/" . $name);
                $obj = (object)[];
                $obj->path = $url;
                $obj->name = $name;
                array_push($images, $obj);
            }
            $listing->images = $images;
            $listing->save();
            return response()->json([
                'success' => true,
                'message' => 'Listing was created successfully',
                'listing' => $listing
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax())
            return response()->json(Listing::withTrashed()->with(['category', 'subcategory', 'thing', "quotes", "quotes.user", "quotes.user.profile", "messages", "messages.sender", "messages.sender.profile"])->where("id", $id)->first());

        return view("desktop.pages.listing", compact("id"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        $param = $request->get("param");
        $value = $request->get("value");

//        $listing = Listing::withTrashed()->find($listing->id);
        $listing[$param] = $value;
        $listing->save();

        return response()
            ->json([
                'listing' => $listing,
                "message" => "",
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listing::where("id", $id)->first()->delete();

        $user_id = Auth::user()->id;

        event(new NotificationEvent(
            __('notifications.listing.title'),
            __('notifications.listing.add', [
                "listing" => $id,
                "user" => $user_id
            ]),
            NotificationType::Info,
            $user_id,
            $id,
            NotificationObjectType::Listing
        ));


        return response()->noContent();
    }

    public function restore($id)
    {
        Listing::withTrashed()
            ->where("id", $id)
            ->first()
            ->restore();

        event(new NotificationEvent(
            __('notifications.listing.title'),
            __('notifications.listing.restore', [
                "listing" => $id,
                "user" => Auth::user()->id
            ]),
            NotificationType::Info,
            Auth::user()->id,
            $id,
            NotificationObjectType::Listing
        ));

        return response()->noContent();
    }

    public function sendQuote(Request $request)
    {
        $request->validate([
            'price' => "required",
            /* 'valid_until_date',*/
            /*'additional_info',*/
            'type_of_transport' => "required",
            'quote_validity' => "required",
            //'formula' => "required",
            'status' => "required",
            'currency' => "required",
            'listing_id' => "required",
            'user_id' => "required",
        ]);

        $hours = [0, 6, 12, 24, 48, 96, 144];

        $latestQuote = Quote::where("listing_id", $request->listing_id)
            ->where("status", 0)
            ->orderBy("created_at", "desc")
            ->first();


        /*    if (!is_null($latestQuote)) // if ($latestQuote->price < $request->price)
            {

                event(new NotificationEvent(
                    "#quote-" . $latestQuote->id,
                    "Cannot make a BID! Your price biggest then actual " . $latestQuote->price . " > " . $request->price,
                    NotificationType::Error,
                    $latestQuote->user_id));

                return response()->noContent();
            }*/

        $quote = Quote::create($request->all());
        $quote->valid_until_date = Carbon::now()->addHours($hours[$request->quote_validity ?? 3]);
        $quote->save();

        if (!is_null($latestQuote)) {

            $latestQuote->status = 1;
            //   $latestQuote->valid_until_date = Carbon::parse($latestQuote->created_at)->addHours($hours[$latestQuote->quote_validity ?? 3]);
            $latestQuote->save();

            event(new NotificationEvent(
                __('notifications.quote.title'),
                __('notifications.quote.status.expired', [
                    "quote" => $quote->id,
                    "user" => $latestQuote->user_id
                ]),
                $latestQuote->user_id,
                $quote->id,
                NotificationObjectType::Quote
            ));

            event(new NotificationQuoteEventBroadcast($latestQuote->user_id));
        }

        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.quote.add', [
                "quote" => $quote->id,
                "listing" => $request->listing_id,
                "user" => Auth::user()->id
            ]),
            NotificationType::Info,
            Auth::user()->id,
            $quote->id,
            NotificationObjectType::Quote
        ));

        $user = User::find(Auth::user()->id);

        Mail::to($user->email)->send(new SendQuoteMail($quote));


        event(new NotificationQuoteEventBroadcast(Auth::user()->id));

        $listing = Listing::where("id", $request->listing_id)->first();

        $message = Message::create([
            "message" => "Hello! My company add a quote to your Listing!",
            "listing_id" => $listing->id,
            "sender_id" => Auth::user()->id,
            "recipient_id" => $listing->user_id
        ]);

        event(new NotificationEvent(
            __('notifications.message.title'),
            __('notifications.message.add', [
                "quote" => $message->id,
                "listing" => $listing->id,
                "user" => $listing->user_id
            ]),
            NotificationType::Info,
            $listing->user_id,
            $message->id,
            NotificationObjectType::Message
        ));

        return response()->noContent();

    }

    public function removeQuote(Request $request)
    {
        $request->validate([
            "listing_id" => "required",
            "quote_id" => "required"
        ]);

        $user_id = Auth::user()->id;

        $quote = Quote::where("id", $request->quote_id)->first();

        if (is_null($quote))
            return response()->json([
                "message" => "Not Found"
            ], 404);


        if ($quote->user_id != $user_id)
            return response()->json([
                "message" => "You are not owner!"
            ], 403);

        $quote->status = 3;
        $quote->save();

        $latestQuote = Quote::where("listing_id", $request->listing_id)
            ->where("status", 1)
            ->orderBy("created_at", "desc")->first();
        if (!is_null($latestQuote)) {
            $latestQuote->status = 0;
            $latestQuote->save();

            event(new NotificationEvent(
                __('notifications.quote.title'),
                __('notifications.quote.remove', [
                    "quote" => $quote->id,
                    "user" => $latestQuote->user_id
                ]),
                NotificationType::Info,
                $latestQuote->user_id,
                $quote->id,
                NotificationObjectType::Quote
            ));

            event(new NotificationQuoteEventBroadcast($latestQuote->user_id));
        }

        return response()->noContent();


    }

    //todo: remove this method
    public function acceptQuote(Request $request)
    {

        $request->validate([
            "listing_id" => "required",
            "quote_id" => "required"
        ]);

        $user_id = Auth::user()->id;

        $latestQuote = Quote::where("listing_id", $request->listing_id)
            ->where("id", $request->quote_id)
            ->first();

        $latestQuote->status = 2;
        $latestQuote->save();

        $user = User::find($user_id);

        $payment = PaymentHistory::create([
            "title" => "Accept Quote",
            "user_id" => $user_id,
            "listing_id" => $request->listing_id,
            "quote_id" => $request->quote_id,
            "amount" => ($latestQuote->price * (max($user->tax, 1) ?? 15)) / 100,
            "tax_amount" => $user->tax ?? 15,
            "currency" => "EUR",
            "type" => "card",
        ]);

        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.quote.accept', [
                "quote" => $request->quote_id,
                "user" => $latestQuote->user_id
            ]),
            NotificationType::Info,
            $latestQuote->user_id,
            $request->quote_id,
            NotificationObjectType::Quote
        ));

        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.quote.accept', [
                "quote" => $request->quote_id,
                "user" => $user_id
            ]),
            NotificationType::Info,
            $user_id,
            $request->quote_id,
            NotificationObjectType::Quote
        ));

        $user = User::find($user_id);

        Mail::to($user->email)->send(new AcceptQuoteMail($latestQuote));

        return response()->json([
            "payment_id" => $payment->id
        ]);
    }

    public function declineQuote(Request $request)
    {
        $request->validate([
            "listing_id" => "required",
            "quote_id" => "required"
        ]);

        $user_id = Auth::user()->id;

        $latestQuote = Quote::where("listing_id", $request->listing_id)
            ->where("id", $request->quote_id)
            ->first();

        $latestQuote->status = 3;
        $latestQuote->save();

        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.quote.decline', [
                "quote" => $request->quote_id,
                "user" => $latestQuote->user_id
            ]),
            NotificationType::Info,
            $latestQuote->user_id,
            $request->quote_id,
            NotificationObjectType::Quote
        ));


        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.quote.decline', [
                "quote" => $request->quote_id,
                "user" => $user_id
            ]),
            NotificationType::Info,
            $user_id,
            $request->quote_id,
            NotificationObjectType::Quote
        ));

        $user = User::find($latestQuote->user_id);

        Mail::to($user->email)->send(new DeclineQuoteMail($latestQuote));

        return response()->noContent();
    }

    public function removeMessage($id)
    {
        if (is_null(Auth::user()->id))
            return response()->json([
                "message" => "User error!"
            ], 400);

        $message = Message::where("sender_id", Auth::user()->id)
            ->where("id", $id)
            ->first();

        $message->delete();

        event(new NotificationEvent(
            __('notifications.quote.title'),
            __('notifications.message.remove', [
                "message" => $id,
                "user" => Auth::user()->id
            ]),
            NotificationType::Info,
            Auth::user()->id,
            $id,
            NotificationObjectType::Message
        ));

        return response()->noContent();
    }

    public function loadMessages($id)
    {
        $messages = Message::with(["sender", "recipient"])->where("listing_id", $id)->get();

        return response()->json(["messages" => $messages]);
    }

    public function sendMessage(Request $request)
    {

        $request->validate([
            'listing_id' => 'required',
            'recipient_id' => 'required',
            'message' => 'required'
        ]);

        if (is_null(Auth::user()->id))
            return response()->json([
                "message" => "User error!"
            ], 400);

        $listing = Listing::where("id", $request->listing_id)->first();

        $sender_id = Auth::user()->id;

        $message = $request->message;


        if (is_null($listing))
            return response()->json([
                "message" => "Bad Request"
            ], 400);

        $message = Message::create([
            "message" => $message,
            "listing_id" => $listing->id,
            "sender_id" => $sender_id,
            "recipient_id" => $request->recipient_id
        ]);

        event(new NotificationEvent(
            __('notifications.message.title'),
            __('notifications.message.add', [
                "message" => $message->id,
                "listing" => $listing->id,
                "user" => $listing->recipient_id
            ]),
            NotificationType::Info,
            $sender_id,
            $message->id,
            NotificationObjectType::Message
        ));

        event(new NotificationEvent(
            __('notifications.message.title'),
            __('notifications.message.add', [
                "message" => $message->id,
                "listing" => $listing->id,
                "user" => $sender_id
            ]),
            NotificationType::Info,
            $listing->recipient_id,
            $message->id,
            NotificationObjectType::Message
        ));


        $users = User::whereIn("id", [$listing->recipient_id, $sender_id])->get();

        if (count($users) > 0)
            foreach ($users as $user)
                Mail::to($user->email)
                    ->send(new NewMessageMail(
                        $message
                    ));


        return response()->json([
            "id" => $message->id
        ]);

    }

    public function goToListing($id, $direction = 1)
    {
        $listing = Listing::whereBetween("id", [$id - 1, $id + 1])->get();

        if (count($listing) == 1)
            return redirect()->route("desktop.listing", $listing[0]->id);

        if (count($listing) == 2) {
            return $direction == 0 ?
                redirect()->route("desktop.listing", $listing[0]->id) :
                redirect()->route("desktop.listing", $listing[1]->id);
        }

        if (count($listing) == 3) {
            return $direction == 0 ?
                redirect()->route("desktop.listing", $listing[0]->id) :
                redirect()->route("desktop.listing", $listing[2]->id);
        }

    }

    public function getRouteForListing(Request $request, $id)
    {
        $listing = Listing::find($id);
        if (is_null($listing))
            return response()->json([
                "message" => "Listing not found"
            ], 404);

        return response()->json($this->mapbox->getAPI()->route(
            $listing->place_of_loading->center[0] ?? 0,
            $listing->place_of_loading->center[1] ?? 0,
            $listing->place_of_delivery->center[0] ?? 0,
            $listing->place_of_delivery->center[1] ?? 0
        ));
    }
}
