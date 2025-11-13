<?php

namespace App\Models;

use App\Models\UserDps;
use Illuminate\Database\Eloquent\Model;

class Dps extends Model
{
    public function userDps() {
        return $this->hasMany(UserDps::class);
    }
}
