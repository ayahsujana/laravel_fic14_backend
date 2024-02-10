<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image_url,
            'stock' => $this->stock,
            'barcode' => $this->barcode,
            'category' => $this->category_id
            // 'category' => new CategoryResource($this->whenLoaded('category')),
            // 'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
