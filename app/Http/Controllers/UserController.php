<?php

namespace App\Http\Controllers;

use App\Models\ObjectCategory;
use App\Models\Profile;
use App\Models\Review;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Models\Category;
use VK\Actions\Auth;

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

    public function changePassword(Request $request)
    {
        $user = User::withTrashed()->with(['profile', 'profile.documents', 'profile.verifications', 'profile.vehicles'])->find(Auth::id());
        if (Hash::check($request->old_password, $user->password)) {
            $new_password = Hash::make($request->new_password);
            $user->password = $new_password;
            $user->save();
            return response()->json([
                "message" => "Password was changed successfully"
            ], 200);

        }
        return response()->json([
            "message" => "Something went wrong"
        ], 400);
    }

    public function profile(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);

        if (is_null($user))
            return view("errors.404");

        $profile = Profile::with(['vehicles', 'user.reviews', 'user.orders','user'])->find($user->profile_id);

        $reviews = Review::where("transporter_id",$user->id)
            ->whereNotNull("order_id")
            ->where("is_visible", true)
            ->whereNull("deleted_at")
            ->get();

        $categories = [];
        if ($profile->transport_specialities !== null) {
            $categories = ObjectCategory::whereIn('id', $profile->transport_specialities)->get();
        }
        $info = (object)[];
        $info->avatar = $user->avatar;
        $info->name = $user->name;
        $info->created_at = $user->created_at;
        $info->payment_methods = $profile->payment_methods;
        if ($profile->payment_methods === null) {
            $info->payment_methods = [];
        }
        $info->transport_specialities = $categories;
        $info->spoken_languages = $profile->spoken_languages;
        if ($profile->spoken_languages === null) {
            $info->spoken_languages = [];
        }
        $info->country = $profile->country;
        $info->region = $profile->region;
        $info->first_name = $profile->first_name;
        $info->second_name = $profile->second_name;
        $info->company_name = $profile->company_name;
        $info->about_company = $profile->about_company;
        $info->additional_service = $profile->additional_service;
        $info->vehicles = $profile->vehicles;
        $info->vehicles_count = $profile->vehicles->count();
        $info->is_approved = $profile->is_documents_approved;

        $info->reviews = is_null($reviews) ? [] : $reviews;
        $info->orders = is_null($profile->user->orders) ? [] : $profile->user->orders;
        $info->user = $profile->user;

        return view("desktop.pages.profile.profile-personal-info", compact("info"));
    }
}
