<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessHourResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'dow' => $this->date,
            'hora' => $this->start_time." - ".$this->end_time,
        ];
        
    }
}
