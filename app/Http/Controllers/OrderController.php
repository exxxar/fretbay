<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Http\Requests\CategoryProperyStoreRequest;
use App\Http\Requests\CategoryProperyUpdateRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\CategoryProperty;
use App\Models\Listing;
use App\Models\Order;
use App\Models\PaymentHistory;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(["listing", "user", "user.profile", "review"])
            ->where("user_id", Auth::user()->id)
            ->orWhere("transporter_id", Auth::user()->id)
            ->paginate(15);

        return response()->json([
            'orders' => $orders
        ]);
    }


    public function getOrdersWithoutReview()
    {
        $orders = Order::with(["review"])
            ->where(function ($query) {
                $query->where("user_id", Auth::user()->id)
                    ->orWhere("transporter_id", Auth::user()->id);
            })
            //->where("status", ">=", 4)
            ->get();

        $tmp = [];

        foreach ($orders as $order)
            if (is_null($order->review))
                array_push($tmp, $order);

        return response()->json(["orders" => $tmp]);
    }

    public function acceptOrder(Request $request)
    {

        $request->validate([
            "quote_id"=>"required",

        ]);

        $user_id = Auth::user()->id;

        $quote = Quote::where("id", $request->quote_id)->first();

        if (is_null($quote))
            return response()->json([
                "message" => "Error quote!"
            ], 404);

        $listing = Listing::where("id", $quote->listing_id)->first();

        if (is_null($listing))
            return response()->json([
                "message" => "Error listing!"
            ], 404);

        $order = Order::where("listing_id", $listing->id)->first();
        if (!is_null($order))
            return response()->json([
                "message" => "Error order!"
            ], 400);


        $quote->status = 2;
        $quote->save();

        $order = Order::create([
            "title" => $listing->title,
            "description" => $listing->additional_info ?? "no description",//Описание заказа
            "price" => $quote->price,//Сумма заказа
            "status" => 0,
            "user_id" => $user_id,
            "listing_id" => $listing->id,
            "transporter_id" => $quote->user_id,
        ]);

        $payment = PaymentHistory::create([
            "title" => "Accept Quote",
            "user_id" => $user_id,
            "listing_id" => $listing->id,
            "quote_id" => $request->quote_id,
            "order_id" => $order->id,
            "amount" => $quote->price,
            "tax_amount" => $user->tax ?? 15,
            "currency" => "EUR",
            "type" => "card",
        ]);

        event(new NotificationEvent(
            "#order-" . $order->id,
            "Create order",
            NotificationType::Info,
            Auth::user()->id));

        return response()->json([
            "order" => $order,
            "payment_id"=>$payment->id
        ]);

    }

    public function changeOrderStatus(Request $request)
    {
        $request->validate([
            "order_id" => "required",
            "status" => "required"
        ]);

        $order = Order::where("id", $request->order_id)->first();

        if (is_null($order))
            return response()->json([
                "message" => "Error!"
            ], 404);


        $order->status = $request->status;
        $order->save();

        event(new NotificationEvent(
            "#order-" . $order->id,
            "Change order status",
            NotificationType::Info,
            Auth::user()->id));

        return response()->json([
            "order" => $order
        ]);

        //start mission
    }


    public function create(Request $request)
    {
        return view('admin.pages.orders.create');
    }


    public function store(OrderStoreRequest $request)
    {
        Order::create($request->validated());

        return response()->noContent();
    }


    public function show(Request $request, $id)
    {
        $order = Order::find($id);
        return view('admin.pages.orders.show', compact('order'));
    }


    public function edit(Request $request, $id)
    {
        $order = Order::find($id);
        return view('admin.pages.orders.update', compact('order'));
    }


    public function update(OrderUpdateRequest $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->validated());

        return response()->noContent();
    }


    public function destroy(Request $request, $id)
    {
        Order::find($id)->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Order::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }

    public function loadActive()
    {
        $orders = Order::with(["listing", "user", "user.profile"])
            ->where(function ($query) {
                $query->where('user_id', Auth::user()->id)
                    ->orWhere('transporter_id', Auth::user()->id);
            })
            ->where("status", "<", 4)
            ->paginate(15);

        return response()->json([
            'orders' => $orders
        ]);

    }

    public function loadArchive()
    {
        $orders = Order::with(["listing", "user", "user.profile"])
            ->where(function ($query) {
                $query
                    ->where('user_id', Auth::user()->id)
                    ->orWhere('transporter_id', Auth::user()->id);
            })
            ->where("status", "=", 4)
            ->paginate(15);

        return response()->json([
            'orders' => $orders
        ]);
    }

    public function loadRemoved()
    {
        return response()->noContent();
    }

    public function addToArchive($id)
    {
        return response()->noContent();
    }

}
