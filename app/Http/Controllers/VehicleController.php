<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryProperyStoreRequest;
use App\Http\Requests\CategoryProperyUpdateRequest;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Models\CategoryProperty;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
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


    public function create(Request $request)
    {
        return view('admin.pages.vehicles.create');
    }


    public function store(VehicleStoreRequest $request)
    {
        Vehicle::create($request->validated());

        return response()->noContent();
    }


    public function show(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.pages.vehicles.show', compact('vehicle'));
    }


    public function edit(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        return view('admin.pages.vehicles.update', compact('vehicle'));
    }


    public function update(VehicleUpdateRequest $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update($request->validated());

        return response()->noContent();
    }


    public function destroy(Request $request, $id)
    {
        Vehicle::find($id)->delete();

        return response()->noContent();
    }

    public function restore(Request $request, $id)
    {
        Vehicle::withTrashed()->where("id", $id)->restore();

        return response()->noContent();
    }
}
