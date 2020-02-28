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
            'title' => $this->title,
            'image' => $this->image,
            'description' => $this->description,
            'happy_hour' => $this->happy_hour,
            'enabled' => $this->enabled,
            'exclusive' => $this->exclusive,
            'end_date' => $this->end_date,
            'promotionHour' => PromotionHourResource::collection($this->hours),
        ];
    }
}
