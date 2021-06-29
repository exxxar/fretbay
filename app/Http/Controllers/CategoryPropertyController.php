<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProperyStoreRequest;
use App\Http\Requests\CategoryProperyUpdateRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\ObjectCategory;
use App\Models\CategoryProperty;
use Illuminate\Http\Request;

class CategoryPropertyController extends Controller
{

    public function index(Request $request)
    {


    }


    public function create(Request $request)
    {
        return view('admin.pages.properties.create');
    }


    public function store(CategoryProperyStoreRequest $request)
    {
        $properties = CategoryProperty::create($request->validated());

        return response()->noContent();
    }


    public function show(Request $request, $id)
    {
        $property = CategoryProperty::find($id);
        return view('admin.pages.properties.show', compact('property'));
    }


    public function edit(Request $request, $id)
    {
        $property = CategoryProperty::find($id);
        return view('admin.pages.properties.update', compact('property'));
    }


    public function update(CategoryProperyUpdateRequest $request, $id)
    {
        $property = CategoryProperty::find($id);
        $property->update($request->validated());

        return response()->noContent();
    }


    public function destroy(Request $request, $id)
    {
        CategoryProperty::find($id)->delete();

        return response()->noContent();
    }
}
