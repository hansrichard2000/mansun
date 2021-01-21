<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilResource extends JsonResource
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
            'student_id' => $this->student_id,
            'name' => $this->name,
            'email' => $this->email,
            'nim' => $this->nim,
            'photo' => $this->photo,
            'departement_name' => $this->department['name'],
        ];
    }
}
