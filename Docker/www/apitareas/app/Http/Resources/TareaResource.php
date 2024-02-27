<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nombre' => 'Nombre: ' .$this->nombre,
            'descripcion' => 'Descripcion: ' .$this->descripcion,
            'Inventado' => 'Inventado: ',
            'etiqueta' => $this->etiquetas!=null?$this->etiquetas->pluck('nombre'):[] 
        ];
    }
}
