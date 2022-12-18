<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\MyService;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        //before処理開始
        $id = rand(0,count(MyService::alldata()));
        MyService::setId($id);
        $merge_data = [
            'id' => $id,
            'msg' => MyService::say(),
            'alldata' => MyService::alldata(),
        ];
        $request->merge($merge_data);
        //before処理終了
        $response = $next($request);

        //after処理開始
        $content = $response->content();
        $content .= '<style>
            body{ background-color:gray; }
            p {font-size:18pt;}
            li {color: red; font-weight:bold;}
            </style>';
        $response->setContent($content);

        return $response;
    }
}
