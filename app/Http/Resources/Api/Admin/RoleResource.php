<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($this->divisi->proker['nama_proker']);
        return [
            'nama_proker' => $this->divisi->proker['nama_proker'],
            'nama_role' => $this->role['role'],
            'nama_divisi' => $this->divisi['nama_divisi'],
        ];
    }
}
