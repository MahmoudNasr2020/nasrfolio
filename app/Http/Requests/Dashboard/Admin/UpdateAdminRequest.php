<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'          =>        ['required','string'],
            'email'         =>        ['required','email',Rule::unique('admins','email')->ignore($this->id,'id')],
            'password'      =>        ['sometimes','nullable','confirmed'],
            'status'        =>        ['required','in:enable,disable'],
            'image'         =>         ['sometimes','nullable','image','max:2048'],
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
            'status.required'=>'الحالة مطلوبة',
            'status.in'=>'يجب ان تكون الحالة مفعل او معطل',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048',


        ];
    }
}
