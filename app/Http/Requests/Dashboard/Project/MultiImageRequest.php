<?php

namespace App\Http\Requests\Dashboard\Project;

use Illuminate\Foundation\Http\FormRequest;

class MultiImageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'file' => ['required','image'],
        ];
    }
    public function messages()
    {
        return [
            'file.required' => 'الصورة مطلوبة',
            'file.image' => 'الصورة غير صالحة'
        ];
    }
}
