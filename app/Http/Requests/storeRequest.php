<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en'=> 'required|max:100|unique:offers',
            'name_ar'=> 'required|max:100|unique:offers',
            'price'=> 'required|numeric',
            'details_en'=> 'required|max:100',
            'details_ar'=> 'required|max:100',
            'photo'=> 'required',


        ];
    }

    public function messages()
    {
        return $messages=[
            'name_en.max'=>trans('messages.max'),
            'name_en.unique'=>trans('messages.unique'),
            'name_en.required'=>trans('messages.required'),
            'name_ar.max'=>trans('messages.max_name_error'),
            'name_ar.unique'=>trans('messages.unique'),
            'name_ar.required'=>trans('messages.required'),
            'price.required'=>trans('messages.required'),
            'details_en.required'=>trans('messages.required'),
            'details_en.max'=>trans('messages.max'),
            'details_ar.required'=>trans('messages.required'),
            'details_ar.max'=>trans('messages.max'),
            'price.numeric'=>trans('messages.price numeric error'),
            'photo.required'=>trans('messages.required'),

        ];
    }
}
