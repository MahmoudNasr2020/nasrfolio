<?php

namespace App\Http\Requests\Dashboard\Resume\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string','unique:categories,name,'.$this->id],
            'image'=>['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'الاسم مطلوب',
            'name.string'    => 'الاسم غير صالح',
            'name.unique'    => 'هذا القسم موجود بالفعل',
            'image.image'    => 'الصورة غير صالحة',

        ];
    }
}
