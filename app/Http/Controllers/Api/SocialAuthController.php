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
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();

    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback(Request $request)
    {
        //echo $request->input('accessToken');exit();
        $social_user = Socialite::driver('facebook')->stateless()->userFromToken($request->input('accessToken',"asogknasogknasolg"));

        //dd($user);
        // Obtenemos los datos del usuario
        //$social_user = Socialite::driver($provider)->stateless()->fields([
        //    'first_name', 'last_name', 'email', 'gender', 'birthday', 'location'
        //])->user(); 

        // En caso de que no exista creamos un nuevo usuario con sus datos.
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
