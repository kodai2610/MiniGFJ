<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //編集可能にする
    protected $fillable = [
        'name','ruby','email','password','tell','gender','birth_day','prefecture_id','city_id',
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function entries() {
        return $this->hasMany('App\Models\Entry');
    }

    public function prefecture() {
        return $this->belongsTo('App\Models\Prefecture');
    }

    public function city() {
        return $this->belongsTo('App\Models\City');
    }
}
