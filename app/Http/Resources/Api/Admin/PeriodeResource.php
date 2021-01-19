<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodeResource extends JsonResource
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
            'tahun_periode' => $this->tahun_periode,
            'gambar_periode' => $this->gambar_periode,
            'nilai' => $this->nilai,
            'created_by' => $this->creator->id,
        ];
    }
}
