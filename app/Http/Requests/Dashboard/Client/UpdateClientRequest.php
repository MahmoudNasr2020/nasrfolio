<?php

namespace App\Http\Requests\Dashboard\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'job'=>['nullable','string'],
            'image'=>['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'الاسم مطلوب',
            'name.string'    => 'الاسم غير صالح',
            'job.string'    => 'الوظيفة غير صالحة',
            'description.required'  => 'كلمة العميل مطلوبة',
            'description.string'    => 'كلمة العميل غير صالحة',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
