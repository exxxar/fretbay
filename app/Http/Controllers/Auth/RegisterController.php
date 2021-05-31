<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\TransporterStoreRequest;
use App\Models\Profile;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function registerCustomer(CustomerStoreRequest $request)
    {

        $customer = Role::where('slug', 'customer')->first();

        $profile = Profile::create([
            "company_name"=>$request->company_name,

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->telephone_number_1??$request->telephone_number_2;
        $user->profile_id = $profile->id;
        $user->save();
        $user->roles()->attach($customer);

        Auth::login($user, true);

        return redirect()->route("login");
    }

    public function registerTransporter(TransporterStoreRequest $request)
    {

        $transporter = Role::where('slug', 'transporter')->first();

        $profile = Profile::create([
            "type"=>$request->type??'transporter',
            "company_name"=>$request->company_name??'',
            "first_name"=>$request->first_name??'',
            "second_name"=>$request->second_name??'',
            "telephone_number_1"=>$request->telephone_number_1??'',
            "telephone_number_2"=>$request->telephone_number_2??'',
            "country"=>$request->country??'',
            "city"=>$request->city??'',
            "region"=>$request->region??'',
            "postal"=>$request->postal??'',
            "areas_of_expertise"=>$request->areas_of_expertise??'',
        ]);

        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->telephone_number_1??$request->telephone_number_2;
        $user->profile_id = $profile->id;
        $user->save();
        $user->roles()->attach($transporter);

        Auth::login($user, true);

        return redirect()->route("login");
    }

}
