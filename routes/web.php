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

Route::group(['namespace'=>'Front'], function (){
   Route::get('index', 'UserControllers@showIndex');
});

Route::get('/' , function (){

    return view('landing');
});

Route::get('/about' , function (){

    return view('about');
});

Route::get('/portfolio' , function (){

    return view('portfolio');
});

Route::get('/contact' , function (){

    return view('contact');
});

Route::get('test', function () {
    return 'welcome';
});

Route::get('test1/{id}/{idd?}', function ($id,$idd=null) {
    if ($idd){
        return $idd;
    }else
        return $idd+$id;
}) -> name('a');

Route::get('test2/{id?}', function ($id=null) {
    if (!$id){
        return 'welcome';
    }else return $id;
}) -> name('b');

//Route::namespace('Front')->group(function (){
//
//    // all routes here will only access controller and methods that exists in folder Front
//
//    Route::get('/users','UserControllers@showAdminName');
//
//});


Route::group(['namespace'=>'Front'], function(){

    Route::get('zero', 'SecondController@showString0')->middleware('auth');
    Route::get('one', 'SecondController@showString1');
    Route::get('two', 'SecondController@showString2');
    Route::get('three', 'SecondController@showString3');


});

Route::get('login', function (){
    return 'this is login page';
})->name('login');



Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/redirect/{service}', 'SocialController@redirect');

Route::get('/auth/{service}/callback', 'SocialController@redirect');

