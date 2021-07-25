<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Models\Favorite;
use App\Models\Listing;
use App\Models\Notification;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $favorites = Favorite::with(["listing",'listing.category', 'listing.subcategory', 'listing.thing','listing.messages'])
            ->where("user_id",Auth::user()->id)
            ->orderBy("id","DESC")
            ->paginate(10);

        return response()->json([
            'favorites' => $favorites
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "listing_id" => "required"
        ]);

        if (is_null(Auth::user()->id))
            return response()->json([
                "message" => "User error!"
            ], 400);


        $listing = Listing::where("id", $request->listing_id)->first();

        if (is_null($listing))
            return response()->json([
                "message" => "Listing not found"
            ], 400);

        $favorite = Favorite::where( "listing_id", $listing->id)
            ->where("user_id", Auth::user()->id)
            ->first();

        if (!is_null($favorite))
            return response()->noContent();


        Favorite::create([
            "listing_id" => $listing->id,
            "user_id" => Auth::user()->id
        ]);

        event(new NotificationEvent(
            $listing->title,
            "Add listing to Favorite",
            NotificationType::Info,
            Auth::user()->id));

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request->validate([
            "listing_id" => "required"
        ]);

        if (is_null(Auth::user()->id))
            return response()->json([
                "message" => "User error!"
            ], 400);

        $listing = Listing::where("id", $request->listing_id)->first();
        $favorite = Favorite::where("listing_id", $request->listing_id)->first();

        if (is_null($favorite))
            return response()->json([
                "message" => "Favorite error!"
            ], 400);

        $favorite->delete();

        event(new NotificationEvent(
            $listing->title,
            "Remove listing from Favorite",
            NotificationType::Info,
            Auth::user()->id));

        return response()->noContent();
    }
}
