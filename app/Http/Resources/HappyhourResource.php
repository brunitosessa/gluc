<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HappyhourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'dow' => $this->date,
            'hora' => $this->start_time." a ".$this->end_time,
        ];
    }
}
