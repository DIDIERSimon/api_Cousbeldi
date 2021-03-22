<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Detail extends JsonResource
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
            'nom' => $this->nom,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
            'prix' => $this->prix,
            'img_path' => $this->img_path,
        ];
    }
}
