<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;
use App\Models\Person;

class HelloController extends Controller
{      
    public function __construct()
    {
    }

    public function index(Request $request){
        $msg = 'show people record.';
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($key) {
            return $key % 2 == 0;
        });
        $result = Person::get()->only($even);

        $data = [
            'msg' => $msg,
            'data' => $result,
        ];

        return view('hello.index',$data);
    }

    public function other() {
        
    }
}
