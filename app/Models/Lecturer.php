<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
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

    public function user(){
        return $this->hasOne(User::class, 'lecturer_id', 'lecturer_id');
    }

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    public function jaka(){
        return $this->belongsTo(Jaka::class, 'jaka_id', 'jaka_id');
    }

    public function title(){
        return $this->belongsTo(Title::class, 'title_id', 'title_id');
    }
}
