<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Requests\SubcategoryUpdateRequest;
use  App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = Subcategory::all();
            return response()->json([
                'subcategories' => $subcategories
            ]);
        }
        $subcategories = Subcategory::all();

        return view('admin.pages.subcategories.index', compact('subcategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.pages.subcategories.create');
    }

    /**
     * @param \App\Http\Requests\SubcategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        Subcategory::create($request->validated());


        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $subcategory = Subcategory::find($id);

        return view('admin.pages.subcategories.show', compact('subcategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        return view('admin.pages.subcategories.edit', compact('subcategory'));
    }

    /**
     * @param \App\Http\Requests\SubcategoryUpdateRequest $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryUpdateRequest $request, $id)
    {

        $subcategory = Subcategory::find($id);

        $subcategory->update($request->validated());

        return response()->noContent();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {

        Subcategory::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
