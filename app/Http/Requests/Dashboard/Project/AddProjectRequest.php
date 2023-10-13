<?php

namespace App\Http\Requests\Dashboard\Project;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required','string'],
            'category'=>['required','string'],
            'date'  =>['required','string'],
            'client'=>['required','string'],
            'location'=>['required','string'],
            'executor'=>['required','string'],
            'overview'=>['required','string'],
            'image'=>['required','image'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المشروع مطلوب',
            'name.string' => 'اسم المشروع غير صالح',
            'category.required' => 'القسم مطلوب',
            'category.string' => 'القسم غير صالح',
            'date.required' => 'تاريخ التنفيذ مطلوب',
            'date.string' => 'تاريخ التنفيذ غير صالح',
            'client.required' => 'العميل مطلوب',
            'client.string' => 'العميل غير صالح',
            'location.required' => 'مكان العميل مطلوب',
            'location.string' => 'مكان العميل غير صالح',
            'executor.required' => 'منفذ العمل مطلوب',
            'executor.string' => 'منفذ العمل غير صالح',
            'overview.required' => 'وصف المشروع مطلوب',
            'overview.string' => 'وصف المشروع غير صالح',
            'image.required' => 'الصورة مطلوبة',
            'image.image' => 'الصورة غير صالحة',

        ];
    }
}
