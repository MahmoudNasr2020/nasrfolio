<?php

namespace App\Http\Requests\Site\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email,'.$this->id],
            'password' => ['nullable','confirmed','min:6'],
            'image' => ['nullable','image','max:2000']
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
            'password.confirmed' =>'كلمة السر غير متشابهة',
            'password.min' =>'كلمة السر يجب ان تكون اكثر من 5 عناصر',
            'image.image' =>'الصورة غير صالحة',
            'image.max' =>'حجم الصورة يجب ان لا يتخطي 2 ميجابايت',
        ];
    }
}
