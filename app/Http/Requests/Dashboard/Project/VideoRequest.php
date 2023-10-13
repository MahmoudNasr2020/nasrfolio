<?php

namespace App\Http\Requests\Dashboard\Project;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => ['required','mimes:mp4,mov,ogg,qt,avi,mkv', 'max:10000000'],
        ];
    }
    public function messages()
    {
        return [
            'file.required' => 'الصورة مطلوبة',
            'file.mimes' => 'الفيديو غير صالحة',
            'file.max' => 'حجم الفيديو اكبر من 100 ميجابايت',
        ];
    }
}
