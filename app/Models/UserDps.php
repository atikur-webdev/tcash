<?php

namespace App\Models;

use App\Models\Dps;
use Illuminate\Database\Eloquent\Model;

class UserDps extends Model
{
    public function dps()
    {
        return $this->belongsTo(Dps::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function installment() {
        return $this->hasMany(Installment::class, 'user_dps_id');
    }
}
