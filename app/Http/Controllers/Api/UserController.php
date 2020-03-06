<?php

namespace App\Http\Controllers\Api;

use App\Bar;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\canUseHappyGluc;

class UserController extends Controller
{
    public function index() {
        return UserResource::collection(User::All());   
    }

    public function show($user_id)
    {
        return new UserResource(User::find($user_id));
    }

    public function useHappygluc($bar_id)
    {
		//$user = App\User::findOrFail(Auth::id());
		$user = User::findOrFail(1);
		$bar = Bar::findOrFail($bar_id);

		//Check if user can use Happygluc in this bar
		$check = new canUseHappyGluc();

		if ($check->execute($bar_id))
		{
			$user->happyglucs()->attach($bar->happygluc);

			return response()->json([
	    		'estado' => 1,
	    		'mensaje' => "Happygluc canjeado"
	    	]);
		}
		else{
			return response()->json([
	    		'estado' => 0,
	    		'mensaje' => "Error"
	    	]);
		}
    }

    public function updateFirebaseId($firebase_id)
    {
    	$user = App\User::findOrFail(Auth::id());
    	$user->firebase_id = $firebase_id;
    	$user->save();
    	return response()->json([
    		'estado' => 1,
    		'mensaje' => "Token actualizado correctamente"
    	]);
    }
}
