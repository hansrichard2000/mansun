<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'mansun_periodes';

    protected $fillable = [
        'tahun_periode',
        'gambar_periode',
        'nilai',
        'created_by',
    ];

    public function creator(){
        return $this->belongsto(User::class, 'created_by', 'id');
    }

    public function proker(){
        return $this->hasMany(User::class, 'periode_id', 'id');
    }
}
