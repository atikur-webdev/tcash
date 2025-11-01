<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['data_key', 'data_value'];
    protected $casts = [
        'data_value' => 'object',
    ];
}



