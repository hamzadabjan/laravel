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
            'name'=> 'required| max:1| unique:users',
            'email'=> 'required',
            'password'=> 'required',
            'phone'=> 'required|numeric',
        ];
    }

    public function messages()
    {
        return $messages=[
            'name.max'=>trans('messages.max_name_error'),

        ];
    }
}
