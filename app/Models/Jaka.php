<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaka extends Model
{
    use HasFactory;

    protected $table = 'jaka';

    protected $fillable = [
        'jaka',
    ];
}
