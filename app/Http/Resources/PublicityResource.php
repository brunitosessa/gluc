<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'descripcion' => $this->description,
            'titulo' => $this->title,
            'foto' => config('app.url')."/storage/images/publicities/".$this->image,
        ];
    }
}
