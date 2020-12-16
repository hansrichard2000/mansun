<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $fillable = [
        'nip',
        'nidn',
        'name',
        'gender',
        'email',
        'phone',
        'line_account',
        'description',
        'photo',
        'department_id',
        'title_id',
        'jaka_id',
    ];

    public function user_email_dosen(){
        return $this->hasOne(User::class, 'id', 'lecturer_id');
    }
}
