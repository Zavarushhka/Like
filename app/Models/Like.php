<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'id_user', 'id_music', 'add_date', 'remove_date'
    ];

    protected $casts = [
        'add_date' => 'datetime',
        'remove_date' => 'datetime',
    ];
}
