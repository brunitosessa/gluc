<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray($request)
    {
    	return [
    		'id' => $this->id,
    		'titulo' => $this->title,
    		'descripcion' => $this->description,
    		'localidad' => $this->city->name,
    		'foto' => config('app.url')."/storage/images/events/".$this->image,
    		'direccion' => $this->address,
    		'precio' => $this->price,
    		'lat' => $this->lat,
    		'lng' => $this->lng,
    		'habilitado' => $this->enabled,
    		'fecha' => $this->date,
    		'tipo' => $this->types->pluck('type'),
    	];
    }
}
