<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Order;
use  App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function index()
    {
    }

    public function getReviews()
    {

        $reviews = Review::with(["transporter", "transporter.profile", "review"])
            ->where(function ($quote){
                $quote->where("user_id", Auth::user()->id)
                    ->orWhere("transporter_id", Auth::user()->id);
            })
            ->where("is_visible", true)
            ->get();

        return response()->json([
            "reviews" => $reviews
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.pages.reviews.create');
    }


    public function attach(Request $request)
    {
        $request->validate([
            "review_id" => "required",
            "message" => "required",
        ]);

        $review = Review::where("id", $request->review_id)->first();

        $attachedReview = Review::create([
            'title' => "Answer to Review #" . $request->review_id,
            'text' => $request->message,
            'type' => 1,
            'user_id' => Auth::user()->id,
            'order_id' => null,
            'transporter_id' => Auth::user()->id,
            'is_visible' => false,
        ]);

        $review->review_id = $attachedReview->id;
        $review->save();


        return response()->json([
            "id" => $review->id
        ]);
    }


    public function store(ReviewStoreRequest $request)
    {
        $review = Review::create($request->validated());
        $review->user_id = Auth::user()->id;

        $order = Order::where("id", $review->order_id)->first();

        $review->transporter_id = $order->transporter_id;
        $review->is_visible = true;
        $review->save();


        return response()->json([
            "id" => $review->id
        ]);
    }


    public function show(Request $request, $id)
    {
        $review = Review::find($id);


        return view('admin.pages.reviews.show', compact('review'));
    }


    public function edit(Request $request, $id)
    {
        $review = Review::find($id);
        return view('admin.pages.reviews.update', compact('review'));
    }


    public function update(ReviewUpdateRequest $request, $id)
    {
        $review = Review::find($id);
        $review->update($request->validated());

        return response()->noContent();
    }


    public function destroy(Request $request, $id)
    {
        $review = Review::find($id);

        if (is_null($review->review_id)) {
            $subReview = Review::find($review->review_id);
            $subReview->delete();
        }
        $review->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Review::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
