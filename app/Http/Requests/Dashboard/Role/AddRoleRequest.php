<?php

namespace App\Http\Requests\Dashboard\Role;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
           'name' => ['required','string','unique:roles,name'],
            'permission'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'اسم الصلاحية مطلوب',
            'name.unique'=>'هذه الصلاحية موجوده بالفعل',
            'name.string'=>'اسم الصلاحية غير صالح',
            'permission.required'=>'الصلاحيات مطلوبة',
        ];
    }
}
