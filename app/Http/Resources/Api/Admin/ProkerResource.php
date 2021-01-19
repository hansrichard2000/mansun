<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProkerResource extends JsonResource
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
            'tahun_periode' => $this->periode['tahun_periode'],
            'nama_proker' => $this->nama_proker,
            'periode_id' => $this->periode_id,
            'status_proker_id' => $this->status_proker_id,
            'deskripsi_proker' => $this->deskripsi_proker,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'pemasukan' => $this->pemasukan,
            'pengeluaran' => $this->pengeluaran,
            'medsos' => $this->medsos,
            'proposal' => $this->proposal,
            'lpj' => $this->lpj,
            'created_by' => $this->created_by,
        ];
    }
}
