<?php

namespace App\Http\Controllers;

use Socialite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleLoginController extends Controller
{
    public function redirect($provider)
    {
         return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);

        Auth::login($user);

        return redirect()->route('home');

    }
    function createUser($getInfo,$provider){

     $user = User::where('provider_id', $getInfo->id)->first();

     if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
    }
}
