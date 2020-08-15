<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Accountant Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "accountant" middleware group. Now create something great!
|
*/

Route::get('accountant', function () {
    return ('accountant panel');
})->name('accountantHomePage')   ;
