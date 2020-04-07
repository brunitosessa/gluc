<?php
namespace App\Http\Controllers\Api;

use App\Bar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BarResource;
use Illuminate\Support\Facades\Auth;

class BarController extends Controller
{
    public function index(Request $request) {
        $lat = $request->input('lat',0);
        $lng = $request->input('lng',0);

        return [
        	'estado' => 1,
        	'bares' => BarResource::collection(Bar::All(), $lat, $lng),
        ];   
    }

    public function show(Request $request, $b_id)
    {
        $lat = $request->input('lat',0);
        $lng = $request->input('lng',0);

        return new BarResource(Bar::find($b_id), $lat, $lng);
    }

    public function addFavorite(Request $request)
    {
        $bar = Bar::findOrFail($request->json('idB'));
        $user = App\User::findOrFail(Auth::id());
        $bar->favorites()->attach($user);

        return [
            'estado' => 1,
        ];
    }
}