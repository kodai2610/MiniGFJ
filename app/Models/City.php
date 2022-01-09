<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public function prefecture() {
        return $this->belongsTo('App\Models\Prefecture');
    }
}
