<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DivisiResource extends JsonResource
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
            'nama_proker' => $this->proker['nama_proker'],
            'nama_divisi' => $this->nama_divisi,
            'proker_id' => $this->proker_id,
            'created_by' => $this->creator->id,
        ];
    }
}
