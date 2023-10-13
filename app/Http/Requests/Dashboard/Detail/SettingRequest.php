<?php

namespace App\Http\Requests\Dashboard\Detail;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'site_name'=>['required','string'],
            'site_status'=>['required','in:0,مفتوح,مغلق'],
            'site_lightness'=>['required','in:نهاري,ليلي'],
            'site_color'=>['required','in:ازرق,احمر,اصفر'],
            'site_image'=>['nullable','image'],
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => 'اسم الموقع مطلوب',
            'site_name.string' => 'اسم الموقع غير صالح',
            'site_status.required' => 'حالة الموقع مطلوبة',
            'site_status.in' => 'حالة الموقع يجب ان تكون من الاختيارات المتاحة',
            'site_lightness.required' => 'سطوع الموقع مطلوب',
            'site_lightness.in' => 'سطوع الموقع يجب ان يكون من الاختيارات المتاحة',
            'site_color.required' => 'الوان الموقع مطلوبة',
            'site_color.in' => 'الوان الموقع يجب ان تكون من الاختيارات المتاحة',
            'site_image.image' => 'صورة الموقع غير صالحة',
        ];
    }
}
