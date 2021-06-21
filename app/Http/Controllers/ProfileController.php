<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Profile;
use App\profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profiles = Profile::all();

        return view('profile.index', compact('profiles'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('profile.create');
    }

    /**
     * @param \App\Http\Requests\ProfileStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {
        $profile = Profile::create($request->validated());

        $request->session()->flash('profile.id', $profile->id);

        return redirect()->route('profile.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Profile $profile)
    {
        return view('profile.show', compact('profile'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * @param \App\Http\Requests\ProfileUpdateRequest $request
     * @param \App\profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        $request->session()->flash('profile.id', $profile->id);

        return redirect()->route('profile.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profile.index');
    }
}
