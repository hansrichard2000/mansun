<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Task extends Model
{
    use HasFactory;

    protected $table = 'mansun_status_tasks';

    protected $fillable = [
        'statustask',
    ];
}
