<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Requests\SubcategoryUpdateRequest;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategories = Subcategory::all();

        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('subcategory.create');
    }

    /**
     * @param \App\Http\Requests\SubcategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        $subcategory = Subcategory::create($request->validated());

        $request->session()->flash('subcategory.id', $subcategory->id);

        return redirect()->route('subcategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Subcategory $subcategory)
    {
        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Subcategory $subcategory)
    {
        return view('subcategory.edit', compact('subcategory'));
    }

    /**
     * @param \App\Http\Requests\SubcategoryUpdateRequest $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryUpdateRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->validated());

        $request->session()->flash('subcategory.id', $subcategory->id);

        return redirect()->route('subcategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategory.index');
    }
}
