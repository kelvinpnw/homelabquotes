<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function discordLogin()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function handlediscordCallback()
    {
        $userSocial = Socialite::driver('discord')->user();
//        var_dump($userSocial);
//        echo $userSocial->id;
        $user = User::where(['discordid' => $userSocial->id])->first();
        if ($user) {
            Auth::login($user);
            //If the user is an admin, take them to the admin panel
            if ($user->admin === 1) {
                return redirect()->action('AdminController@index');

            } //Otherwise, take them to the account page.
            else {
                return redirect()->action('AccountController@index');

            }
        } else {
            $newuser = new User();
            $newuser->discordid = $userSocial->id;
            $newuser->name = $userSocial->name;
            $newuser->save();
            $user = User::where(['discordid' => $userSocial->id])->first();
            Auth::login($user);
            return redirect()->action('AccountController@index');
        }

    }
}
