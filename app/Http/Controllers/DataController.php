<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeRequest;
use App\Offer;
use App\User;
use \Validator;
use Illuminate\Http\Request;
use LaravelLocalization;


class DataController extends Controller
{
    public function getData(){
        /*return User::select('id',
            'details_'.'LaravelLocalization::getCurrentLocale()'.' as details'
        )
            ->get();*/
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

        Offer::create([
           'name_en' => $request-> name_en,
           'name_ar' => $request-> name_ar,
           'price' => $request-> price,
           'details_en' => $request-> details_en,
           'details_ar' => $request-> details_ar,

        ]);

        return redirect()->back()->with(['success'=>'all right']);
    }

    public function getAllOffers(){
        $offers = Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price',
            'details_'.LaravelLocalization::getCurrentLocale().' as details'
        )
            ->get();
        //$offers = Offer::select('id','name_en','name_ar','price','details_en','details_ar')->get();
        return view('all', compact('offers'));
    }

}
