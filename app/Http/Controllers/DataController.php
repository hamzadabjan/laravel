<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateRequest;
use App\Http\Requests\storeRequest;
use App\Offer;
use App\Traits\OfferTrait;
use App\User;
use phpDocumentor\Reflection\Location;
use \Validator;
use LaravelLocalization;


class DataController extends Controller
{
    use OfferTrait;


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

        $this-> saveImage($request->photo, 'images/offers');

        Offer::create([
            'name_en' => $request-> name_en,
            'photo' => $request-> photo,
            'name_ar' => $request-> name_ar,
            'price' => $request-> price,
            'details_en' => $request-> details_en,
            'details_ar' => $request-> details_ar,

        ]);

        return redirect()->back()->with(['success'=>'all right']);
    }

    public function updateOffer(updateRequest $request,$offer_id){

        $offer = Offer::find($offer_id);
        if (!$offer){
            return redirect()->back();
        }
        $offer->update($request->all());
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

    public function editOffer($offer_id){


        //$offer_exits = Offer::find($offer_id);
        /*if (!$offer_exits)
            return redirect()->back();
        else {*/
            if($offer = Offer::select('id','name_en', 'name_ar', 'details_en', 'details_ar', 'price')->find($offer_id))
                return view('edit', compact('offer'));
        //}

    }

    public function deleteOffer($offer_id){

        Offer::where('id', $offer_id)->delete();
        return redirect()->back()->with('alert', 'Deleted!');



    }



}
