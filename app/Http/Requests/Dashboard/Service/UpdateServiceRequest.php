<?php

namespace App\Http\Requests\Dashboard\Service;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'image'=>['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'الاسم مطلوب',
            'name.string'    => 'الاسم غير صالح',
            'description.required'  => 'الوصف مطلوب',
            'description.string'    => 'الوصق غير صالح',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
