<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'mansun_roles';

    protected $fillable = [
        'role',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'divisi_role_user', 'mansun_role_id', 'mansun_user_id');
    }

    public function divisis(){
        return $this->belongsToMany(Divisi::class, 'divisi_role_user', 'id', 'mansun_divisi_id');
    }
}
