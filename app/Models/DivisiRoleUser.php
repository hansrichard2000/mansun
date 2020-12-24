<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DivisiRoleUser extends Pivot
{
    use HasFactory;

    protected $table = 'divisi_role_user';

    protected $fillable = [
       'mansun_divisi_id',
       'mansun_role_id',
       'mansun_user_id',
    ];

    public function divisi(){
        return $this->belongsTo(Divisi::class, 'mansun_divisi_id', 'id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'mansun_role_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'mansun_user_id', 'id');
    }
}
