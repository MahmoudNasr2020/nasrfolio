<?php

namespace App\Http\Requests\Site\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'name' => ['required','string'],
           'email' => ['required','email','unique:users,email'],
           'password' => ['required','confirmed','min:6']
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'الاسم مطلوب',
            'name.string' =>'الاسم غير صالح',
            'email.required' =>'البريد الالكتروني مطلوب',
            'email.email' =>'البريد الالكتروني  غير صالح',
            'email.unique' =>'البريد الالكتروني مسجل لدينا بالفعل',
            'password.required' =>'كلمة السر مطلوية',
            'password.confirmed' =>'كلمة السر غير متشابهة',
            'password.min' =>'كلمة السر يجب ان تكون اكثر من 5 عناصر',
        ];
    }
}
