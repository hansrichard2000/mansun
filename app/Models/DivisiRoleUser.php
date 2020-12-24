<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisiRoleUser extends Model
{
    use HasFactory;

    protected $table = 'divisi_role_user';

    protected $fillable = [
       'mansun_divisi_id',
       'mansun_role_id',
       'mansun_user_id',
    ];
}
