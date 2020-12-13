<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
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

    public function divisi()
    {
        return $this->hasMany(Divisi::class, 'created_by', 'id');
    }

    public function taskCreator(){
        return $this->hasMany(Task::class, 'created_by', 'id');
    }

    public function taskReceiver(){
        return $this->hasMany(Task::class, 'penanggung_jawab', 'id');
    }

    public function emailMahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function emailDosen(){
        return $this->belongsTo(Dosen::class);

    }

    public function isAdmin() {
        if ($this->is_admin == '1' && $this->is_active =='1') {
            return true;
        }
        return false;
    }
}
