<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\ListingStoreRequest;
use App\Http\Requests\ListingUpdateRequest;
use App\Models\ObjectCategory;
use App\Models\Listing;
use Illuminate\Http\Request;

class LisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.listings.create');
    }

    /**
     * @param \App\Http\Requests\CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListingStoreRequest $request)
    {
        Listing::create($request->validated());

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $listing = Listing::find($id);
        return view('admin.pages.listings.show', compact('listing'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $listing = Listing::find($id);
        return view('admin.pages.listings.update', compact('listing'));
    }

    /**
     * @param \App\Http\Requests\CategoryUpdateRequest $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(ListingUpdateRequest $request, $id)
    {
        $listing = Listing::find($id);
        $listing->update($request->validated());

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Listing::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
