<?php

namespace App\Http\Requests\Dashboard\Skill;

use Illuminate\Foundation\Http\FormRequest;

class Skill_Description extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'العنوان مطلوب ' ,
            'title.string' => 'العنوان غير صالح',
            'description.required' => 'الوصف مطلوب ' ,
            'description.string' => 'الوصف غير صالح',

        ];
    }
}
