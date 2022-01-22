<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }
}
