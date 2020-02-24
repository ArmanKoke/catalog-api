<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->name,
            'price' => (int) $this->price,
            'weight' => (int) $this->weight,
            'color' => $this->color,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'tags' => $this->resource->tags->pluck('name')->all(),
        ];
    }
}
