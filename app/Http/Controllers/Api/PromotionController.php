<?php

namespace App\Http\Controllers\Api;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;

class PromotionController extends Controller
{
    public function index() {
        return PromotionResource::collection(Promotion::All());   
    }

    public function show($p_id)
    {
        return new PromotionResource(Promotion::find($p_id));
    }
}
