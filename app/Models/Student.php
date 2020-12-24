<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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

    public function user(){
        return $this->hasOne(User::class, 'student_id', 'student_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }
}
