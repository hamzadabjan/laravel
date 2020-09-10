<?php

namespace App\Http\Controllers;


use App\Offer;
use Illuminate\Http\Request;
use LaravelLocalization;

use App\Traits\OfferTrait;


class OfferAjaxController extends Controller
{
    use OfferTrait;

    public function create()
    {
        // view form to add offer
        return view('ajaxoffers.createAjax');
    }

    public function store(storeRequest $request)
    {
        // save offer into DB using ajax
        $file_name = $this->saveImage($request->photo, 'images/offers');

        $offer = Offer::create([
            'name_en' => $request->name_en,
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,

        ]);

        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);
        else
            return response()->json([
                'status' => false,
                'msg' => 'خطأ',
            ]);
    }

    public function all()
    {
        $offers = Offer::select('id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'photo',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )
            ->get();
        //$offers = Offer::select('id','name_en','name_ar','price','details_en','details_ar')->get();
        return view('all', compact('offers'));
    }

    public function delete(Request $request)
    {

        Offer::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'تم الحذف بنجاح',
            'id' => $request->id
        ]);

    }

    public function edit(Request $request)
    {


        $offer = Offer::find($request->offer_id);
        if (!$offer)
            return response()->json([
                'status' => false,
                'msg' => 'هذا العرض غير مسبسيبسيب'

            ]);

        $offer = Offer::select('id', 'name_en', 'name_ar', 'details_en', 'details_ar', 'price')->find($request->offer_id);
        return view('ajaxoffers/editajax', compact('offer'));


    }


    public function update(Request $request)
    {

        $offer = Offer::find($request->offer_id);
        if (!$offer)
            return response()->json([
                'status' => false,
                'msg' => 'هذا العرض غير موجود'

            ]);
        else {
            Offer::find($request->offer_id)->update($request->all());
            //$offer->update($request->all());
            return response()->json([
                'status' => true,
                'msg' => 'تم التعديل بنجاح'
            ]);
        }

    }
}
