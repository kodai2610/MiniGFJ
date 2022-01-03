<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/admin', function () {
    return view('admin.welcome');
});

Route::get('/company', function () {
    return view('company.welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// ユーザー
Route::namespace('User')->prefix('/')->name('user.')->group(function () {
    //prefixで全てのuriに対して特定の接頭辞をつける
    //nameで別名
    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    //auth:ガード名で認証されたユーザだけにアクセス許可
    Route::middleware('auth:users')->group(function () {
        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        //crud対応
        //resource(uri, controller,routeの制限)
    });
});


// 企業
Route::namespace('Company')->prefix('company')->name('company.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:companies')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});


