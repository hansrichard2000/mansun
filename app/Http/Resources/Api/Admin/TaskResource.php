<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'deadline' => $this->deadline,
            'link_hasil_kerja' => $this->link_hasil_kerja,
            'penanggung_jawab' => $this->penanggung_jawab,
            'divisi_id' => $this->divisi_id,
            'status_task_id' => $this->status_task_id,
            'created_by' => $this->creator->id,
        ];
    }
}
