<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'nip',
        'nidn',
        'nama',
        'gender',
        'email',
        'phone',
        'line_account',
        'keterangan',
        'passfoto',
        'prodi_id',
        'jabatan_id',
        'jaka_id',
    ];
}
