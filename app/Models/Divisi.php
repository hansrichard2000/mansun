<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'mansun_divisis';

    protected $fillable = [
        'nama_divisi',
        'proker_id',
        'created_by',
    ];

    public function proker(){
        return $this->belongsTo(Proker::class, 'proker_id', 'id');
    }

    public function creator(){
        return $this->belongsto(User::class, 'created_by', 'id');
    }
}
