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

        $user = User::UpdateOrCreate(
        	[
                'facebook_id' => $social_user->getId(),
            ],
            [    
                'name' => explode(' ', trim($social_user->getName()))[0],
                'lastname' => explode(' ', trim($social_user->getName()))[1],
                'email' => $social_user->getEmail,
                'avatar' => $social_user->getAvatar(),
                'api_token' => Str::random(60),
            ]
        );

        return [
            'estado' => 1,
            'usuario' => new UserResource(User::find($user->id)),
        ];   

        //return Auth::login($user);
    } 
}
