<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $profile = Profile::create($request->user["profile"]);

            User::create([
                "name" => $request->user["name"],
                "email" => $request->user["email"],
                "phone" => $request->user["phone"],
                "password" => bcrypt($request->user["password"]),
                "profile_id" => $profile->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }

        return response()->noContent(200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);

        return view("admin.pages.users.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(["profile"])->where("id", $id)->first();

        return view("admin.pages.users.update", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {


            $user = User::where("id", $id)->first();
            $user->name = $request->user["name"];
            $user->email = $request->user["email"];
            $user->phone = $request->user["phone"];
            $user->save();

            $profile = Profile::find($user->profile_id);
            $profile->update($request->user["profile"]);

        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }

        return response()->noContent(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->noContent();
    }

    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();

        return response()->noContent();
    }
}
