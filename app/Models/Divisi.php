<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'mansun_divisis';

    protected $fillable = [
        'nama_divisi',
        'proker_id',
        'created_by',
    ];

    public function proker(){
        return $this->belongsTo(Proker::class, 'proker_id', 'id');
    }

    public function creator(){
        return $this->belongsto(User::class, 'created_by', 'id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'divisi_role_user', 'id', 'mansun_role_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'divisi_role_user', 'id', 'mansun_user_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'divisi_id', 'id');
    }
}
