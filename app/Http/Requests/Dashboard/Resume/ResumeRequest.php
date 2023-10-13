<?php

namespace App\Http\Requests\Dashboard\Resume;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'=>['required','string'],
            'date'=>['required','string'],
            'description'=>['required','string'],
            'points'=>['nullable','string'],
            'category_id'=>['required','not_in:0'],

            ];
    }

    public function messages()
    {
        return [
            'title.required'  => 'العنوان مطلوب',
            'title.string'    => 'العنوان غير صالح',
            'date.required'  => 'التاريخ مطلوب',
            'date.string'    => 'التاريخ غير صالح',
            'description.required'  => 'الوصف مطلوب',
            'description.string'    => 'الوصف غير صالح',
            'points.string'    => 'النقاط غير صالحة',
            'category_id.required'  => 'القسم مطلوب',
            'category_id.not_in'  => 'القسم مطلوب',

        ];
    }
}
