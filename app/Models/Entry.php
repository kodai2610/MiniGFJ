<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //
    protected $fillable = [
        'user_id', 'job_id', 'status',
    ];

    public function job() {
        return $this->belongsTo('App\Models\Job');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}
