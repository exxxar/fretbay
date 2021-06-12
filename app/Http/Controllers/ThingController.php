<?php

namespace App\Http\Controllers;

use  App\Models\Thing;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $things = Thing::all();
        return response()->json([
            'things' => $things
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.things.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Thing::create($request->thing);

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Thing $thing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thing = Thing::find($id);

        return view("admin.pages.things.show", compact("thing"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Thing $thing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thing = Thing::find($id);

        return view("admin.pages.things.update", compact("thing"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Thing $thing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $thing = Thing::find($id);
        $thing->update($request->all());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Thing $thing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thing::find($id)->delete();

        return response()->noContent();
    }
}
