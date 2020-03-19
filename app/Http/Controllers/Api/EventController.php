<?php
namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index() {
    	return [
        	'estado' => 1,
        	'eventos' => EventResource::collection(Event::All()),
        ];
    }

    public function show($e_id)
    {
        return new EventResource(Event::find($e_id));
    }
}