<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
// use Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider(String $provider){
        return \Socialite::driver($provider)->redirect();
    }

    public function providerCallback(String $provider)
    {
        try{
            $social_user = \Socialite::driver($provider)->user();

            // find accound 
            $account = SocialAccount::whwre([
                'provider_name' => $provider,
                'povider_id'   => $social_user->getId()
            ])->first();

            if($account){
                auth()->login($account->user);
                return redirect()->route('home');
            }

            $user = User::where([
                'email' =>$social_user->getEmail()
            ])->first();

            if(!$user){
                $user = User::create([
                    'email' => $social_user->getEmail(),
                    'name' => $social_user->getName(),
                ]);
            }

            $user->socialAccounts()->create([
                'provider_id'=>$social_user->getId(),
                'provider_name'=>$provider
            ]);
            auth()->login($user);
            return redirect()->route('home');

        }catch(\Exception $e){
            return redirect()->route('login');
        }
    }
}
