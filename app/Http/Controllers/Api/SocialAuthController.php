<?php

namespace App\Http\Controllers\Api;
 
use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
 
class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        //This works whe you need to log into facebook from backend
    }
    
    public function handleProviderCallback(Request $request)
    {
        $social_user = Socialite::driver('facebook')->stateless()->userFromToken($request->json('accessToken'));

        Log::emergency($social_user->user['email']);
        $user = User::UpdateOrCreate(
        	[
                'facebook_id' => $social_user->user['id'],
            ],
            [    
                'name' => $social_user->user['first_name'],
                'lastname' => $social_user->user['last_name'],
                'email' => $social_user->user['email'],
                'avatar' => $social_user->avatar,
                'api_token' => Str::random(60),
            ]
        );
        return Auth::login($user);
    } 
}
