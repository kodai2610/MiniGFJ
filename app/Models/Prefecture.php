<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    //
    public function cities() {
        return $this->hasMany('App\Models\City');
    }
}
