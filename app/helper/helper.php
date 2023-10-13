<?php


use App\Models\Detail;

if(!function_exists('settings'))
{
    function settings()
    {
        $setting = Detail::first();
        return $setting;
    }
}
