<?php

namespace App\Http\Requests\Dashboard\Resume\Category;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string','unique:categories,name'],
            'image'=>['required','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'الاسم مطلوب',
            'name.string'    => 'الاسم غير صالح',
            'name.unique'    => 'هذا القسم موجود بالفعل',
            'image.required' => 'الصورة مطلوبة',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
