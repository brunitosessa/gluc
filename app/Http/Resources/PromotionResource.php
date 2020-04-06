<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
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
            'promotionHour' => PromotionHourResource::collection($this->hours),
        ];
    }
}
