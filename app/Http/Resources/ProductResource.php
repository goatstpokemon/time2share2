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
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'product_image' => $this->product_image,
                'rentable' => $this->rentable,
                'return_date' => $this->return_date,
                'rental_started' => $this->rental_started,
                'rented_by' => $this->rented_by,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

            ],
            'relationships' => [
                'id' => (string)$this->user->id,
                'user name' => (string)$this->user->name,
                'user email' => (string)$this->user->email,
            ]

        ];
    }
}
