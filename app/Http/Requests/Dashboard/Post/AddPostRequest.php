<?php

namespace App\Http\Requests\Dashboard\Post;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=>['required','string'],
            'description'=>['required','string'],
            'image'=>['required','image'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'  => 'عنوان المنشور مطلوب',
            'title.string'    => 'عنوان المنشور غير صالح',
            'description.required'  => 'الوصف مطلوب',
            'description.string'    => 'الوصف غير صالح',
            'image.required' => 'الصورة مطلوبة',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
