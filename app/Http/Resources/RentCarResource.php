<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RentCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toResponse($request): array
    {
        $car = null;

        if (count($this->cars) > 0) {
            $car = $this->cars[0];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'car_id' => $car->id ?? null,
            'car_brand' => $car->model->brand->name ?? null,
            'car_model' => $car->model->name ?? null,
        ];
    }
}
