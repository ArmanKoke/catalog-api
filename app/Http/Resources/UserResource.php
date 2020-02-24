<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'is_active' => (bool) $this->is_active,
            'email' => $this->email,
            'updated_at' => (string) $this->updated_at,
            'created_at' => (string) $this->created_at,
            'roles' => CategoryResource::collection($this->whenLoaded('roles')),
        ];
    }
}
