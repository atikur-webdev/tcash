<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    public function userDps() {
        return $this->belongsTo(UserDps::class);
    }
    public function dps() {
        return $this->belongsTo(Dps::class);
    }
}
