<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferLevel extends Model
{
    protected $table = 'refer_levels';
    protected $fillable = ['level'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
