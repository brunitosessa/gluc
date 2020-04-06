<?php

namespace App\Http\Controllers\Api;

use App\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;

class PromotionController extends Controller
{
    public function index() {
    	return [
        	'estado' => 1,
        	'promocionesSemana' => PromotionResource::collection(Promotion::All()),
			'dow' => date('w'),
		];
    }

    public function show($p_id)
    {
        return new PromotionResource(Promotion::find($p_id));
    }
}
