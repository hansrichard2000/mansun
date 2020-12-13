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

    public function creator(){
        return $this->belongsto(User::class, 'created_by', 'id');
    }

    public function receiver(){
        return $this->belongsto(User::class, 'penanggung_jawab', 'id');
    }

    public function status_task(){
        return $this->belongsto(Status_Task::class, 'status_task_id', 'id');
    }
}
