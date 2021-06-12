<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\Order;
use  App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
    }

    public function create(Request $request)
    {
        return view('admin.pages.reviews.create');
    }


    public function store(ReviewStoreRequest $request)
    {
        Review::create($request->validated());

        return response()->noContent();
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
        Review::find($id)->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Review::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
