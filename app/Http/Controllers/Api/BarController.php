<?php
namespace App\Http\Controllers\Api;

use App\Bar;
use App\Http\Controllers\Controller;
use App\Http\Resources\BarResource;
use Illuminate\Support\Facades\Auth;

class BarController extends Controller
{
    public function index() {
        return [
        	'estado' => 1,
        	'bares' => BarResource::collection(Bar::All()) 
        ];   
    }

    public function show($b_id)
    {
        return new BarResource(Bar::find($b_id));
    }
}