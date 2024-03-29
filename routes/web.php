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

use App\Http\Controllers\HelloController;
use App\Http\Controllers\User\EntryController;
use App\Models\Entry;
use App\Http\Middleware\HelloMiddleware;

//practice
Route::get('/hello/{id?}', 'HelloController@index')->name('hello');






Route::get('/', function () {
    return view('user.welcome');
})->name('user.welcome');   

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

        Route::resource('job', 'JobController');

        Route::prefix('entry')->name('entry.')->group(function() {
            Route::get('/', 'EntryController@index')->name('index');
            Route::get('/{id}', 'EntryController@show')->name('show');
            Route::post('/{id}', 'EntryController@store')->name('store');
            Route::post('/add/{id}', 'EntryController@add')->name('add');
            Route::delete('/{id}', 'EntryController@destroy')->name('destroy');
        });
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
        //職種一覧
        Route::prefix('occupation')->name('occupation.')->group(function() {
            Route::get('/','OccupationController@index')->name('index');
            Route::get('/create','OccupationController@create')->name('create');
            Route::post('/','OccupationController@store')->name('store');
            Route::get('/{id}/edit','OccupationController@edit')->name('edit');
            Route::put('/{id}','OccupationController@update')->name('update');
            Route::delete('/{id}','OccupationController@destroy')->name('destroy');
        });
        
        //業界
        Route::resource('industry', 'IndustryController', ['except' => 'show']);

        //企業管理
        Route::resource('company', 'CompanyController');
        
        //特徴
        Route::resource('feature', 'FeatureController');

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
        
        //求人
        Route::resource('job', 'JobController');

        Route::prefix('entry')->name('entry.')->group(function() {
            Route::get('/', 'EntryController@index')->name('index');
            Route::get('/{id}', 'EntryController@show')->name('show');
            Route::post('/{id}', 'EntryController@add')->name('add');
            Route::delete('/{id}', 'EntryController@destroy')->name('destroy');
        });

    });
});


//Ajax
Route::get('/get-cities', 'AjaxController@getCities')->name('ajax.get_cities');
// Route::get('/get-messages', 'AjaxController@getMessages')->name('ajax.get_messages');