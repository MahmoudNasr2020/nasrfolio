<?php

namespace App\Http\Requests\Dashboard\Service;

use Illuminate\Foundation\Http\FormRequest;

class AddServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string'],
            'description'=>['required','string'],
            'image'=>['required','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'الاسم مطلوب',
            'name.string'    => 'الاسم غير صالح',
            'description.required'  => 'الوصف مطلوب',
            'description.string'    => 'الوصف غير صالح',
            'image.required' => 'الصورة مطلوبة',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
