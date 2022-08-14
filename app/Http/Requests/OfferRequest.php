<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return[
            'name_en'  => 'required|max:100|unique:offers',
            'name_ar'  => 'required|max:100|unique:offers',
            'price' => 'required|numeric',
            'detals_en'=> 'required',
            'detals_ar'=> 'required',
           ];
    }

    public function messages()
    {
        return [
                'name_en.required'  => __(key:'messages.offer name required'),
                'name_ar.required'  => __(key:'messages.offer name required'),
                'name_en.unique'  => __(key:'messages.offer name must be unique'),
                'name_ar.unique'  => __(key:'messages.offer name must be unique'),
                'price.numeric'  => __(key:'messages.offer price must be Number'),
                'price.required'  => __(key:'messages.price is required'),
                'detals_en.required'  => __(key:'messages.detals is required'),
                'detals_ar.required'  => __(key:'messages.detals is required'),
               ];
    }
}
