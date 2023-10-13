<?php

namespace App\Http\Requests\Site\Post\Comment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'comment' => ['required','string'],
            'id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'comment.required' =>'التعليق مطلوب',
            'comment.string' =>'التعليق غير صالح',
            'id.required' =>'رقم التعليق مطلوب',
        ];
    }
}
