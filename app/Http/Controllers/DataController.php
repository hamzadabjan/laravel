<?php

namespace App\Http\Controllers;

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

    public function storeData(Request $request){

        $rules= $this -> getRules();
        $messages= $this -> getMessages();

        $validator= Validator::make($request->all(),$rules,$messages);

        if ($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        User::create([
           'name' => $request-> name,
           'password' => $request-> password,
           'email' => $request-> email,
           'phone' => $request-> phone
        ]);

        return redirect()->back()->with(['success'=>'all right']);
    }
    protected function getRules(){
        return $rules=[
            'name'=> 'required| max:10| unique:users',
            'email'=> 'required',
            'password'=> 'required',
            'phone'=> 'required|numeric',
        ];
    }

    protected function getMessages(){
        return $messages=[
            'name.max'=>trans('messages.max_name_error'),

        ];
    }
}
