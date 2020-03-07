<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int id
 * @property string name
 * @property string updated_at timestamp
 * @property string created_at timestamp
 */
class CategoryResource extends JsonResource
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
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
            'items' => ItemResource::collection($this->whenLoaded('items')), //just for showcase, better count or not show items at all
            'tags' => $this->resource->tags->pluck('slug')->all(),
        ];
    }
}
