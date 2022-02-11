<?php

namespace App\Http\Middleware;

use Closure;

class HelloMiddleware
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
        // $data = [
        //     ['name' => 'taro', "mail" => 'taro@yamada'],
        //     ['name' => 'hanako', "mail" => 'hanako@flower'],
        //     ['name' => 'sachiko', "mail" => 'sachiko@happy'],
        // ];
        // $request->merge(['data' => $data]);
        // return $next($request);
        $response = $next($request);
        //コントローラからレスポンスがかえってくる
        $content = $response->content();
        //HTMLコードが帰ってくる
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        //正規表現
        $replace = '<a href="http://$1">$1</a>';
        //正規表現
        $content = preg_replace($pattern, $replace, $content);
        //$contentから$patternを探して,$replaceに置換
        $response->setContent($content);
        //レスポンスへのコンテンツ設定
        return $response;
    }
}
