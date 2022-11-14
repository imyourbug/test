<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Socialite;
use Exception;
use Auth;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $facebookId = User::where('facebook_id', $user->id)->first();

            if($facebookId){
                Auth::login($facebookId);
                return redirect()->route('home');
            }else{
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => null
                ]);

                Auth::login($createUser);
                Session::put('checkFacebook',$createUser);
                return redirect()->route('home');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }

    }
}
