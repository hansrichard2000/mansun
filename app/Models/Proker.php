<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;

    protected $table = 'mansun_prokers';

    protected $fillable = [
        'nama_proker',
        'periode_id',
        'status_proker_id',
        'deskripsi_proker',
        'tanggal_mulai',
        'tanggal_akhir',
        'pemasukkan',
        'pengeluaran',
        'medsos',
        'proposal',
        'lpj',
        'gambar_proker',
        'created_by',
    ];
}
