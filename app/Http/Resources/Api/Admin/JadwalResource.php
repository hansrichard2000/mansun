<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
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
            'nama_divisi' => $this->divisi['nama_divisi'],
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'deadline' => $this->deadline,
            'link_hasil_kerja' => $this->link_hasil_kerja,
            'penanggung_jawab' => $this->receiver->student['name'],
            'divisi_id' => $this->divisi_id,
            'status_task_id' => $this->status_task_id,
            'created_by' => $this->creator->id,
        ];
    }
}
