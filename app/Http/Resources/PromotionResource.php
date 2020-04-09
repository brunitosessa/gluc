<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    public function toArray($request)
    {
        for ($i; $i<7; $i++)
        {
            //
        }
        return [[
            'id' => $this->id,
            'titulo' => $this->title,
            'foto' => config('app.url')."/storage/images/promotions/".$this->image,
            'descripcion' => $this->description,
            'habilitado' => $this->enabled,
            'exclusivo' => $this->exclusive,
            'end_date' => $this->end_date,
            'idB' => $this->bar->id,
            'fotoBar' => '',
            'logo' => '',
            'abierto' => 1,
            'distancia' => 0,
            'nombreBar' => "mangalga",
            'cantidadLikes' => 0,
            'idT' => 1,
            'horarioApertura' => "abierto siempre",
            'exclusivo' => 0,
            'promotionHour' => PromotionHourResource::collection($this->hours),
        ]];
    }
}
