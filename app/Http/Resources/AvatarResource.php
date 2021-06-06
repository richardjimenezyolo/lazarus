<?php

namespace App\Http\Resources;

use App\Models\Backpack;
use Illuminate\Http\Resources\Json\JsonResource;

class AvatarResource extends JsonResource
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
            'id'            => $this->id,
            'user_id'       => $this->user_id,
            'health_points' => $this->health_points,
            'backpack'      => BackpackResource::make($this->backpack->load('items'))
        ];
    }
}
