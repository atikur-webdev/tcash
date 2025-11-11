<?php

namespace App\Models;

use App\Models\UserDps;
use Illuminate\Database\Eloquent\Model;

class Dps extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
}
