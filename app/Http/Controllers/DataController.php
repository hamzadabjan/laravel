<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeRequest;
use App\User;
use \Validator;
use Illuminate\Http\Request;


class DataController extends Controller
{
    public function getData(){
        return User::select('id')->get();
    }


    public function insertData(){

        User::create([
            'name'=>'hanan',
            'email'=>'assdfasd@asd.com',
            'phone' => '450',
            'password'=>'00'
        ]);
    }

    public function createData(){
        return view('create');
    }

    public function createData2(){
        return view('create2');
    }

    public function storeData(storeRequest $request){

        User::create([
           'name' => $request-> name,
           'password' => $request-> password,
           'email' => $request-> email,
           'phone' => $request-> phone
        ]);

        return redirect()->back()->with(['success'=>'all right']);
    }

}
