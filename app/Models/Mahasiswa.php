<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'nim',
        'name',
        'gender',
        'email',
        'phone',
        'line_account',
        'batch',
        'description',
        'photo',
        'department_id',
    ];

    public function user_email_mahasiswa(){
        return $this->hasOne(User::class, 'id', 'student_id');
    }
}
