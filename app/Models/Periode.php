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
}
