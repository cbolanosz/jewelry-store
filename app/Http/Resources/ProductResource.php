<?php

/* Author: Cristian Bolaños */

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'material' => $this->getMaterial(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'category' => $this->getCategory()->getName(),
            'image' => url($this->getImageUrl()),
            'link' => route('product.show', ['id' => $this->getId()]),
        ];
    }
}
