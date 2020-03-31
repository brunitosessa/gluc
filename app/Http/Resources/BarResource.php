<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\canUseHappyGluc;

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
            'fotoPeque' => config('app.url')."/storage/images/bars/".$this->image,
            'logo' => config('app.url')."/storage/images/bars/logos/".$this->logo,
            'abierto' => $this->is_opened['open'],
            'horarioApertura' => $this->is_opened['message'],
            'horarios' => BusinessHourResource::collection($this->businessHours()->orderBy('date','asc')->get()),
            'promociones' => PromotionResource::collection($this->promotions),
            'listaHappy' => HappyhourResource::collection($this->happyhours()->orderBy('date','asc')->get()),
            'tienePremio' => (int)!is_null($this->happygluc),
            'tienePromo' => $this->promotions->count(),
            'tieneHappy' => (int)$this->happyhours()->exists(),
            'tieneExclusivo' => (int)$this->promotions()->where('exclusive','1')->exists(),
            'habilitadoPedir' => (new canUseHappyGluc)->execute($this->id),
            'abierto' => $this->isOpened,
        ];
    }
}
