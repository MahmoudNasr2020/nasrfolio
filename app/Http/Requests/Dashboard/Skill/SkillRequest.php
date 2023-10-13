<?php

namespace App\Http\Requests\Dashboard\Skill;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'add_skill.*.name'=>['required','string'],
            'add_skill.*.percent'=>['required','numeric'],
        ];
    }

    public function messages()
    {
        return [
            'add_skill.*.name.required' => 'اسم المهارة مطلوب ' ,
            'add_skill.*.name.string' => 'اسم المهارة غير صالح',
            'add_skill.*.percent.required' => 'النسبة مطلوبة',
            'add_skill.*.percent.numeric' => 'النسبة يجب ان تكون رقمية',

        ];
    }
}
