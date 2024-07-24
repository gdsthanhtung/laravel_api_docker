<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'ten_sp' => $this->name,
            'gia_sp' => $this->price,
            'tao_luc' => $this->created_at->format('d/m/Y'),
            'cap_nhat_luc' => $this->updated_at->format('d/m/Y')
        ];
    }
}
