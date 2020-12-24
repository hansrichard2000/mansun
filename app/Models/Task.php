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
        'divisi_id',
        'status_task_id',
        'created_by',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'penanggung_jawab', 'id');
    }

    public function status_task(){
        return $this->belongsTo(Status_Task::class, 'status_task_id', 'id');
    }

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'divisi_id', 'id');
    }
}
