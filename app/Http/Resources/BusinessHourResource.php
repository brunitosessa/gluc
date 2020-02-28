<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BusinessHourResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dow' => config('constants.DOW')[$this->date],
            'horario' => (new Carbon($this->start_time))->format('H:i')." - ".(new Carbon($this->end_time))->format('H:i'),
        ];
        
    }
}
