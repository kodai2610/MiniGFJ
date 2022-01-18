<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    //ブラックリスト方式

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

    //このcompanyが所属する業界を返す
    public function industry() {
        return $this->belongsTo('App\Models\Industry');
    }

    //このcompanyが所属する都道府県
    public function prefecture() {
        return $this->belongsTo('App\Models\Prefecture');
    }

    //このcompanyが所属する市区町村
    public function city() {
        return $this->belongsTo('App\Models\City');
    }

}
