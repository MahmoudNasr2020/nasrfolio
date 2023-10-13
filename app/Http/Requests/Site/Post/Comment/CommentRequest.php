<?php

namespace App\Http\Requests\Site\Post\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'comment' => ['required','string'],
            'post_id' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'comment.required' =>'التعليق مطلوب',
            'comment.string' =>'التعليق غير صالح',
            'post_id.required' =>'رقم البوست مطلوب',
        ];
    }
}
