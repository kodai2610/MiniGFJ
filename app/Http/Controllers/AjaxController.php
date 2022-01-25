<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\City;

class AjaxController extends Controller
{
    //
    public function getCities(Request $request) 
    {   
        if ($request->ajax()) {//ajax通信であるか？
            $prefectureId = $request->input('prefecture_id'); //県の入力を取得
            $cities = City::where('prefecture_id', $prefectureId)->get()->toArray();
            return $cities; 
            //配列が返ってくる
        }
    }
}
