<?php

namespace App\Http\Resources\Api;

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
            'tahun_periode' => $this->tahun_periode,
            'nilai' => $this->nilai,
            'created_by' => $this->creator->id,
        ];
    }
}
