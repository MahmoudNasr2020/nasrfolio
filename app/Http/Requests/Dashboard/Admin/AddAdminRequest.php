<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          =>        ['required','string'],
            'email'         =>        ['required','email','unique:users,email'],
            'password'      =>        ['required','confirmed'],
            'status'        =>        ['required','in:enable,disable'],
            'image'        =>         ['nullable','image','max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'name.string'=>'الاسم غير صالح',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.unique'=>'البريد الالكتروني موجود بالفعل',
            'password.required'=>'كلمة السر مطلوبة',
            'password.confirmed'=>'كلمة السر غير متطابقة',
            'status.required'=>'الحالة مطلوبة',
            'status.in'=>'يجب ان تكون الحالة مفعل او معطل',
            // 'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الصورة غير صالحة',
            'image.max' => 'حجم الصورة يجب ان يكون اقل من 2048 كيلو بايت ',
        ];
    }
}
