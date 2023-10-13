<?php

namespace App\Http\Requests\Dashboard\Detail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string'],
            'job'=>['required','string'],
            'birthday'=>['required','string'],
            'website'=>['required','url'],
            'phone'=>['required','string'],
            'city'=>['required','string'],
            'degree'=>['required','string'],
            'age'=>['required','numeric'],
            'mail'=>['required','email'],
            'freelance'=>['required','not_in:0'],
            'facebook'=>['required','url'],
            'twitter'=>['required','url'],
            'linkedIn'=>['required','url'],
            'github'=>['required','url'],
            'whatsApp'=>['required','url'],
            'telegram'=>['required','url'],
            'image'=>['nullable','image'],
            'cv'=>['nullable','mimes:pdf','max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم غير صالح',
            'job.required' => 'الوظيفة مطلوبة',
            'job.string' => 'الوظيفة غير صالحة',
            'birthday.required' => 'تاريخ الميلاد مطلوب',
            'birthday.string' => 'تاريخ الميلاد غير صالح',
            'website.required' => 'الموقع الالكتروني مطلوب',
            'website.url' => 'الموقع الالكتروني غير صالح',
            'phone.required' => 'رقم الموبايل مطلوب',
            'phone.string' => 'رقم الموبايل غير صالح',
            'city.required' => 'المدينة مطلوبة',
            'city.string' => 'المدينة غير صالحة',
            'degree.required' => 'الدرجة مطلوبة',
            'degree.string' => 'الدرجة غير صالحة',
            'age.required' => 'العمر مطلوب',
            'age.numeric' => 'العمر يجب ان يكون رقمي',
            'mail.required' => 'الايميل مطلوب',
            'mail.email' => 'الايميل غير صالح',
            'freelance.required' => 'الفري لانسر مطلوب',
            'freelance.not_in' => 'الفري لانسر مطلوب',
            'facebook.required' => 'الفيس بوك مطلوب',
            'facebook.url' => 'الفيس بوك غير صالح',
            'twitter.required' => 'تويتر مطلوب',
            'twitter.url' => 'تويتر غير صالح',
            'linkedIn.required' => 'لينكد ان مطلوب',
            'linkedIn.url' => 'لينكد ان غير صالح',
            'github.required' => 'جيت هب مطلوب',
            'github.url' => 'جيت هب غير صالح',
            'whatsApp.required' => 'الواتس اب مطلوب',
            'whatsApp.url' => 'الواتس اب غير صالح',
            'telegram.required' => 'تيليجرام مطلوب',
            'telegram.url' => 'تيليجرام غير صالح',
            'image.image' => 'الصورة غير صالحة',
            'cv.mimes' => 'السي في غير صالح',
            'cv.max' => 'السي في يجب ان يكون حجمه اقل من 5 ميجا بايت',

        ];
    }
}
