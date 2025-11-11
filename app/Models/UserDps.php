<?php

namespace App\Models;

use App\Models\Dps;
use Illuminate\Database\Eloquent\Model;

class UserDps extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
