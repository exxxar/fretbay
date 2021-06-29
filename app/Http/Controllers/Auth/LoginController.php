<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /* public function login(Request $request)
     {
         $credentials = $request->validate([
             'username' => ['required', 'email'],
             'password' => ['required'],
         ]);


         $user = User::where('email', '=', $request->username)->first();
         if ($user === null)
             abort(402,$request->username);

         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();

             return redirect()->intended('dashboard');
         }

     }*/

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        Log::info("TEST");
        Log::info($request->get("email")." ".$request->get("password"));

        $credentials = request(['password']);
        $credentials['email'] = $request->email;
        $credentials['deleted_at'] = null;

        if (!Auth::attempt($credentials))
            return redirect()->route("login")->withErrors(['Bad credentials']);

        $user = $request->user();

        if ($user->hasRole("transporter"))
            return redirect()->route("transporter-account");


        if ($user->hasRole("admin"))
            return redirect()->route("admin.index");


        return redirect()->route("customer-account");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return response()->redirectToRoute("login");
    }

}
