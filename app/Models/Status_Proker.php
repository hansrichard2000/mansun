<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Proker extends Model
{
    use HasFactory;

    protected $table = 'mansun_status_prokers';

    protected $fillable = [
        'statusproker',
    ];

    public function prokers(){
        return $this->hasMany(Proker::class, 'status_proker_id', 'id');
    }
}
