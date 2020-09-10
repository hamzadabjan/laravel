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
Route::get('data', 'DataController@getData');


    Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
    {
        Route::group(['prefix'=>'data', 'middleware' => 'web'], function (){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get ('insert','DataController@insertData');
    Route::get('create','DataController@createData');
    Route::get('create2','DataController@createData2');
    Route::post('store','DataController@storeData')->name('data.store');
    Route::get('all','DataController@getAllOffers');
    Route::get('edit/{offer_id}','DataController@editOffer')->name('edit.offer');
    Route::post('update/{offer_id}','DataController@updateOffer')->name('update.offer');
    Route::get('delete/{offer_id}','DataController@deleteOffer')->name('delete.offer');

    });
});

Route::get('youtube','eventController@getVideo');

######## Begin Ajax route ##########
Route::group(['prefix'=>'ajax-offers'],function (){
   Route::get('create','OfferAjaxController@create');
   Route::post('store','OfferAjaxController@store')->name('ajax.offers.store');
   Route::get('all','OfferAjaxController@all')->name('ajax.offers.all');
   Route::post('delete','OfferAjaxController@delete')->name('ajax.offers.delete');
    Route::get('edit/{offer_id}','OfferAjaxController@edit')->name('ajax.offers.edit');
    Route::post('update','OfferAjaxController@update')->name('ajax.offers.update');
});


######## End Ajax route ##########
