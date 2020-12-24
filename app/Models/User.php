<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mansun_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'lecturer_id',
        'email',
        'password',
        'is_login',
        'email_verified_at',
        'is_active',
        'is_admin',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function periodes(){
        return $this->hasMany(Periode::class, 'created_by', 'id');
    }

    public function prokers(){
        return $this->hasMany(Proker::class, 'created_by', 'id');
    }

    public function divisis()
    {
        return $this->belongsToMany(Divisi::class, 'divisi_role_user', 'mansun_divisi_id', 'id');
    }

    public function taskCreator(){
        return $this->hasMany(Task::class, 'created_by', 'id');
    }

    public function taskReceiver(){
        return $this->hasMany(Task::class, 'penanggung_jawab', 'id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'divisi_role_user', 'mansun_role_id', 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class, 'lecturer_id', 'lecturer_id');

    }

    public function isAdmin() {
        if ($this->is_admin == '1' && $this->is_active =='1') {
            return true;
        }
        return false;
    }

//    public function isHod(){
//        if ($this->is_)
//    }
}
