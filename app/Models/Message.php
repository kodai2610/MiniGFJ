<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'entry_id','is_user','message',
    ];

    protected $guarded = [
        'created_at','updated_at',
    ];

    public function entry() {
        return $this->belongsTo('App\Models\Entry');
    }
}
