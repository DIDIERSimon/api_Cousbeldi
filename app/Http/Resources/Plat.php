<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Plat extends JsonResource
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
            'Nom' => $this->Nom,
            'description' => $this->description,
            'prix' => $this->prix,
            'url_path' => $this->url_path,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format("d/m/Y"),
        ];
    }
}
