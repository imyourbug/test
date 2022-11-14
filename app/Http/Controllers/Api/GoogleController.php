<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login-home');
        }

        if (explode("@",$user->email)[1] !== 'gmail.com')
        {
            return redirect('/');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser                    = new User;
            $newUser->name              = $user->name;
            $newUser->google_id         = $user->id;
            $newUser->email             = $user->email;
            $newUser->email_verified_at = now();
            $newUser->save();
            auth()->login($newUser, true);
        }

        Session::put('checkGoogle',$existingUser);
        return redirect()->route('home');
    }
}
