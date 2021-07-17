<?php

namespace App\Http\Controllers;

use App\Classes\MapBoxAPIManager;
use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $listings = Listing::with(['category', 'subcategory', 'thing'])->orderByDesc('created_at')->paginate(15);
        return response()->json([
            'listings' => $listings
        ]);
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
        $moving_package = $request->formula??null;

        Log::info("self=>".$only_self);

        $listings = Listing::with(['category', 'subcategory', 'thing']);

        if (count($distance_range_value) > 0)
            $listings = $listings->whereBetween("distance", $distance_range_value);

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
            $listings = $listings->where("shipping_date_from", ">", $date_from)
                ->orWhere("unshipping_date_from", ">", $date_from);

        if (!is_null($date_to))
            $listings = $listings->where("shipping_date_to", "<", $date_to)
                ->orWhere("unshipping_date_to", "<", $date_to);

        if (!is_null($address_from))
            $listings = $listings->where("place_of_loading->place_name", $address_from->place_name);

        if (!is_null($moving_package))
            $listings = $listings->whereIn("moving_package", $moving_package);

        if (!is_null($address_to))
            $listings = $listings->where("place_of_delivery->place_name", $address_to->place_name);

        if (count((array)$request->categories) > 0)
            $listings = $listings->whereIn("category_id", $request->categories);

        $listings = $listings->orderByDesc('created_at')->paginate(15);

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
        $place_of_loading = json_decode($request->get('place_of_loading'));
        $place_of_delivery = json_decode($request->get('place_of_delivery'));

        $listing = Listing::create([
            'title' => $request->get('title') ?? '',
            'articles' => json_decode($request->get('articles')) ?? [],
            'place_of_loading' => $place_of_loading,
            'place_of_delivery' => $place_of_delivery,
            'shipping_date_from' => Carbon::createFromTimestamp($request->get('shipping_date_from')),
            'shipping_date_to' => Carbon::createFromTimestamp($request->get('shipping_date_to')),
            'unshipping_date_from' => Carbon::createFromTimestamp($request->get('unshipping_date_from')),
            'unshipping_date_to' => Carbon::createFromTimestamp($request->get('unshipping_date_to')),
            'messages' => $request->get('messages') ?? [],
            'additional_info' => $request->get('additional_info') ?? '',
            'moving_package' => $request->get('moving_package') ?? '',
            'images' => [],
            'status' => $request->get('status') ?? '',
            'distance' => $this->mapbox->getAPI()->getMathDistance(
                $place_of_loading->center[0] ?? 0,
                $place_of_loading->center[1] ?? 0,
                $place_of_delivery->center[0] ?? 0,
                $place_of_delivery->center[1] ?? 0
            ),
            'expiration_date' => Carbon::createFromTimestamp($request->get('unshipping_date_to')),
            'category_id' => $request->get('category_id') ?? null,
            'subcategory_id' => $request->get('subcategory_id') ?? null,
            'thing_id' => $request->get('thing_id') ?? null,
            'user_id' => $request->get('user_id') ?? null,
            'summary_volume' => $request->get('summary_volume') ?? 0,
        ]);


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
            return response()->json(Listing::with(['category', 'subcategory', 'thing'])->where("id",$id)->first());

        return view("desktop.pages.listing",compact("id"));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
