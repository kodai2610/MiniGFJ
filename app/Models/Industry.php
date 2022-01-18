<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    //
    protected $fillable = [
        'name'
    ];
    /*
        public
        どこからでもアクセス可能です。アクセス修飾子がない場合は、publicを指定したものと同じになります。

        protected
        そのクラス自身と継承クラスからアクセス可能です。つまり非公開ですが、継承は可能となります。

        private
        同じクラスの中でのみアクセス可能です。非公開で継承クラスからもアクセス不可能となります。
    */
    public function companies() {
        return $this->hasMany('App\Models\Company');
    }
}
