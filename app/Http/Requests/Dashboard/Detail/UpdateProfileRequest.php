<?php

namespace App\Http\Requests\Dashboard\Detail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'          =>        ['required','string'],
            'email'         =>        ['required','email','unique:admins,email,'.Auth::user()->id],
            'password'      =>        ['sometimes','nullable','confirmed'],
            'image'         =>        ['sometimes','nullable','image','max:2048'],
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'البريد الالكتروني غير صالح',
            'email.unique'=>'البريد الالكتروني موجود بالفعل',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',


        ];
    }
}
