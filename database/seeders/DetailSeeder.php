<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{

    public function run()
    {
        Detail::truncate();
        Detail::create(['name'=>'Mahmoud Nasr', 'job'=>'Software Engineer & Web Developer', 'birthday'=>'1 اغسطس 1999',
            'website'=>'https://nasrportfolio.manarhays.com',
            'phone'=>'+201127421485', 'city'=>'Beni Suef', 'age'=>23, 'mail'=>'mmmnnn2016161515@gmail.com',
            'freelance'=>'متاح', 'image'=>'image.png', 'facebook'=>'https://www.facebook.com/profile.php?id=100011445331879',
            'twitter'=>'https://twitter.com/mmmnnn201616151', 'linkedIn'=>'https://www.linkedin.com/in/mahmoud-nasr-62b9481b9/',
            'github'=>'https://github.com/MahmoudNasr2020', 'whatsApp'=>'https://api.whatsapp.com/send/?phone=201127421485',
            'telegram'=>'https://web.telegram.org/k/',
            'cv'=>'Nasr']);
    }
}
