<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'mansun_tasks';

    protected $fillable = [
        'judul',
        'deskripsi',
        'deadline',
        'link_hasil_kerja',
        'penanggung_jawab',
        'status_task_id',
        'created_by',
    ];
}
