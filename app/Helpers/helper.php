<?php

use App\Models\Setting;
use Illuminate\Support\Str;

function trxGenerator() {
    return Str::random(10);
}
function siteCurrency() {
   return $settings = Setting::first();
}