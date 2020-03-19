<?php

namespace App\Http\Controllers\Api;

use App\Publicity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublicityResource;

class PublicityController extends Controller
{
    public function index() {
        return PublicityResource::collection(Publicity::All());   
    }

    public function show($e_id)
    {
        return new PublicityResource(Publicity::find($e_id));
    }
}
