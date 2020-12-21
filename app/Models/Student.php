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
        return $this->hasMany(Student::class, 'student_id', 'student_id');
    }
}
