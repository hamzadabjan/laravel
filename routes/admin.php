<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', function () {
    return 'welcome to admin panel';
})->middleware('auth');

Route::group(['prefix' => 'users', 'middleware'=>'auth'], function (){

    Route::get('1',function() {
      return 'work1';
    });
    Route::get('2',function() {
        return 'work2';
    });

});

Route::resource('news', 'NewsController');
