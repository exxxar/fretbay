<?php

namespace App\Http\Controllers;

use App\Enums\NotificationType;
use App\Events\NotificationEvent;
use App\Http\Requests\VehicleStoreRequest;
use App\Http\Requests\VehicleUpdateRequest;
use App\Models\Profile;
use App\Models\Vehicle;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TransporterController extends Controller
{

    public function profile(Request $request)
    {
        $user = $request->user();

        $profile = Profile::find($user->profile_id);

        if ($profile->is_first_activation == 0) {

            return view("desktop.pages.profile.transporter.index");
        }
        return redirect()->route("desktop.profile-transporter-wizard-start");

    }

    //
    public function update(Request $request)
    {
//        $user->profile->update($request->all());

//        $edit_profile = json_decode($request->profile, false);
        $profile = Profile::with(["vehicles", "documents", "verifications"])->where("id", $request->profile_id)->first();
        $profile->first_name = $request->get('first_name') ?? '';
        $profile->second_name = $request->get('second_name');
        $profile->telephone_number_1 = $request->get('telephone_number_1');
        $profile->telephone_number_2 = $request->get('telephone_number_2');
        $profile->country = $request->get('country');
        $profile->region = $request->get('region');
        $profile->city = $request->get('city');
        $profile->postal = $request->get('postal');
        $profile->save();

        Log::info(print_r($request->all(), true));


        $user = User::with(["profile"])->where("id", Auth::id())->first();
        $user->avatar = $request->avatar;
        if ($request->hasFile('new_avatar')) {
            if ($request->file('new_avatar')->isValid()) {
                $validated = $request->validate([
                    'new_avatar' => 'mimes:jpeg,png,svg,jpg|max:1014',
                ]);
                $extension = $request->new_avatar->extension();
                $request->new_avatar->storeAs('/public', $request->file('new_avatar')->getClientOriginalName() . "." . $extension);
                $url = Storage::url($request->file('new_avatar')->getClientOriginalName() . "." . $extension);

                $user->avatar = $url;
                if (!empty($request->deleted_avatar) || $request->deleted_avatar != '') {
                    //todo: delete previous avatar
//                $rest = substr($request->deleted_avatar, 8);
//                Storage::delete($rest);
                }
            }
        }

        $user->email = $request->email ?? $user->email;
        $user->save();
//        return redirect()->back()->withErrors(["success"]);

        event(new NotificationEvent(
            "#account-" . $user->id,
            "Update user account",
            NotificationType::Info,
            Auth::user()->id));

        return response()->json([
            'user' => $user,
            'profile' => $profile
        ]);
    }

    public function save(Request $request)
    {
        $user = User::find(Auth::id());
        $profile = Profile::with(['documents', 'verifications', 'vehicles'])->find($user->profile_id);
        $key = $request->get("key");
        $value = $request->get("value");

        $profile[$key] = $value;
        if ($request->has("finish"))
        {

            $profile->is_first_activation = false;
        }
        $profile->save();

        return response()->json([
            'profile' => $profile
        ]);
    }

    public function saveWithoutApproval(Request $request)
    {
        $user = User::find(Auth::id());
        $profile = Profile::with(['documents', 'verifications', 'vehicles'])->find($user->profile_id);
        $profile->update($request->all());
        $profile->is_approved = false;
        $profile->save();
//        todo: send notification to admin
        return response()->json([
            'profile' => $profile
        ]);
    }

    public function saveWithApproval(Request $request)
    {
        $user = User::find(Auth::id());
        $profile = Profile::with(['documents', 'verifications', 'vehicles'])->find($user->profile_id);
        $profile->update($request->all());
        $profile->save();
        return response()->json([
            'profile' => $profile
        ]);
    }

    public function getVehicles()
    {
        $user = User::with(["profile"])->where("id", Auth::id())->first();
        $vehicles = $user->profile->vehicles()->get();
        return response()->json([
            'vehicles' => $vehicles,
        ]);
    }

    public function storeVehicle(Request $request)
    {
        $images = [];
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            foreach ($files as $key => $file) {
                $extension = $file->extension();
                $file->storeAs('/public', $file->getClientOriginalName() . "." . $extension);
                $url = Storage::url($file->getClientOriginalName() . "." . $extension);
                array_push($images, $url);
            }
        }
        $vehicle = Vehicle::create([
            'profile_id' => intval($request->profile_id),
            'type' => $request->type,
            'brand' => $request->brand,
            'model' => $request->model,
            'plate_number' => $request->plate_number,
            'total_laden_weight' => $request->total_laden_weight,
            'cubing' => $request->cubing,
            'images' => $images,
        ]);
        $vehicle->images = $images;
        $vehicle->save();
        return response()->json([
            'vehicle' => $vehicle,
        ]);
    }

    public function updateVehicle(Request $request)
    {
        $edit_vehicle = json_decode($request->vehicle, false);
        $vehicle = Vehicle::find($request->id);
        $vehicle->type = $edit_vehicle->type;
        $vehicle->brand = $edit_vehicle->brand;
        $vehicle->model = $edit_vehicle->model;
        $vehicle->plate_number = $edit_vehicle->plate_number;
        $vehicle->total_laden_weight = $edit_vehicle->total_laden_weight;
        $vehicle->cubing = $edit_vehicle->cubing;

        $images = $edit_vehicle->images;
        $new_files = $request->file('new_files');
        if ($request->hasFile('new_files')) {
            foreach ($new_files as $key => $file) {
                $extension = $file->extension();
                $file->storeAs('/public', $file->getClientOriginalName() . "." . $extension);
                $url = Storage::url($file->getClientOriginalName() . "." . $extension);
                array_push($images, $url);
            }
        }
        $delete_files = json_decode($request->delete_files, true);
        if (!empty($delete_files)) {
            foreach ($delete_files as $file) {
//                $rest = substr($file['path'], 8);
//                Storage::delete($rest);
            }
        }

        $vehicle->images = $images;
        $vehicle->save();

        return response()->json([
            'vehicle' => $vehicle,
        ]);
    }

    public function destroyVehicle(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->forceDelete();

        return response()->noContent();
    }
}
