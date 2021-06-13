<?php

namespace App\Http\Controllers;

use App\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $listings = Listing::with(['category', 'subcategory', 'thing'])->orderByDesc('created_at')->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $listing = Listing::create([
            'title'=> $request->get('title')??'',
            'articles'=> json_decode($request->get('articles'))??[],
            'place_of_loading'=> json_decode($request->get('place_of_loading')) ,
            'place_of_delivery'=> json_decode($request->get('place_of_delivery')) ,
            'shipping_date_from'=> $request->get('shipping_date_from') ,
            'shipping_date_to'=> $request->get('shipping_date_to') ,
            'unshipping_date_from'=> $request->get('unshipping_date_from') ,
            'unshipping_date_to'=> $request->get('unshipping_date_to') ,
            'messages'=> $request->get('messages')??[],
            'additional_info'=> $request->get('additional_info')?? '',
            'images'=> [],
            'status'=> $request->get('status')??'',
//            'expiration_date'=> $request->get('')
            'expiration_date'=> $request->get('unshipping_date_to'),
            'category_id'=> $request->get('category_id')??null,
            'subcategory_id'=> $request->get('subcategory_id')??null,
            'thing_id'=> $request->get('thing_id')??null,
            'user_id'=> $request->get('user_id')??null,
            'summary_volume'=>  $request->get('summary_volume')??0,
        ]);
        $images=[];
        $path = '/listings/listing'.$listing->id;
        if(!Storage::exists('/public'.$path)) {
            Storage::makeDirectory('/public'.$path);
        }
        $files = $request->file('images');
        if ($request->hasFile('images')) {
            foreach ($files as $key=>$file) {
                $name = $file->getClientOriginalName();
//                $ext = $file->getClientOriginalExtension();
                $file->storeAs("/public", $path.'/'.$name);
                $url = Storage::url('listings/listing'.$listing->id.$name);
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
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
