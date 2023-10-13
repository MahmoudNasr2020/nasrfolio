<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        DB::table('permissions')->orderBy('id','desc')->delete();
        $permissions = [
            'عرض-عميل',
            'اضافة-عميل',
            'تعديل-عميل',
            'حذف-عميل',
            'عرض-بوست',
            'اضافة-بوست',
            'تعديل-بوست',
            'حذف-بوست',
            'عرض-مشروع',
            'اضافة-مشروع',
            'تعديل-مشروع',
            'حذف-مشروع',
            'عرض-قسم',
            'اضافة-قسم',
            'تعديل-قسم',
            'حذف-قسم',
            'عرض-سيرة-ذاتية',
            'اضافة-سيرة-ذاتية',
            'تعديل-سيرة-ذاتية',
            'حذف-سيرة-ذاتية',
            'عرض-مهارة',
            'اضافة-مهارة',
            'تعديل-مهارة',
            'حذف-مهارة',
            'عرض-خدمة',
            'اضافة-خدمة',
            'تعديل-خدمة',
            'حذف-خدمة',
            'عرض-مستخدم',
            'حذف-مستخدم',
            'عرض-صلاحية',
            'اضافة-صلاحية',
            'تعديل-صلاحية',
            'حذف-صلاحية',
            'عرض-ادمن',
            'اضافة-ادمن',
            'تعديل-ادمن',
            'حذف-ادمن',
            'تعديل-التفاصيل-الاعدادت',
        ];

        foreach ($permissions as $permission)
        {

            Permission::updateOrCreate(['name'=>$permission,'guard_name'=>'admin']);
        }
    }
}
