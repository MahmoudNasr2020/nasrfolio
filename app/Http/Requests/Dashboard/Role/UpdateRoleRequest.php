<?php

namespace App\Http\Requests\Dashboard\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string','unique:roles,name,'.$this->id],
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
