<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->name,
            'direccion' => $this->address,
            'descripcion' => $this->description,
            'telefono' => $this->phone,
            'email' => $this->email,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'fotopeque' => config('app.url')."storage/images/bars/".$this->image,
            'logo' => config('app.url')."storage/images/bars/logos/".$this->logo,
            'abierto' => $this->is_opened,
            'horarios' => BusinessHourResource::collection($this->businessHours()->orderBy('date','asc')->get()),
            'promociones' => PromotionResource::collection($this->promotions->where('happy_hour', '=', 0)),
            'listaHappy' => PromotionResource::collection($this->promotions->where('happy_hour', '=', 1)),
            'tienePremio' => !is_null($this->happygluc),
            //'habilitadoPedir' => 
        ];
    }
}
