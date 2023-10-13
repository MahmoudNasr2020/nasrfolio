<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'job', 'birthday', 'website', 'phone', 'city', 'age', 'mail',
                        'freelance', 'image', 'facebook', 'twitter', 'linkedIn','degree','cv',
        'github', 'whatsApp', 'telegram','site_name', 'site_status', 'site_lightness', 'site_color', 'site_image'];
}
