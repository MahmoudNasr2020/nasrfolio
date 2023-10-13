<?php

namespace App\Http\Requests\Dashboard\Skill;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required','string','unique:skills,name,'.$this->id],
            'percent'=>['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم المهارة مطلوب ' ,
            'name.string' => 'اسم المهارة غير صالح',
            'name.unique' => 'هذه المهاره موجوده بالفعل',
            'percent.required' => 'النسبة مطلوبة',
            'percent.numeric' => 'النسبة يجب ان تكون رقمية',

        ];
    }
}
