<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth')->except('showString2');
    }

    public function showString(){
        return 'this is second controller';
    }

    public function showString0(){
        return 'this is 0';
    }
    public function showString1(){
        return 'this is 1';
    }
    public function showString2(){
        return 'this is 2';
    }
    public function showString3(){
        return 'this is 3';
    }
}
