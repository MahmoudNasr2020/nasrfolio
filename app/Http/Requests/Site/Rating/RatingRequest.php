<?php

namespace App\Http\Requests\Site\Rating;

use Illuminate\Foundation\Http\FormRequest;

class RatingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'rating' => ['required','in:1,2,3,4,5'],
            'comment' => ['required','string'],
            'project_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'rating.required' =>'التقييم  مطلوب',
            'rating.in' =>'التقييم يجب ان يكون من بين الخمس نجوم',
            'comment.required' =>'التعليق مطلوب',
            'comment.string' =>'التعليق غير صالح',
            'project_id.required' =>'المشروع مطلوب',
        ];
    }
}
