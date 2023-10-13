<?php

namespace Database\Seeders;

use App\Models\Skill_Description;
use Illuminate\Database\Seeder;

class SkillDescSeeder extends Seeder
{

    public function run()
    {
        Skill_Description::create([
            'title'=> 'I have been able to experience and developing skill with this type of learning and facilitates.',
            'description' => 'I was doing everything in my power to provide me with all the experiences to provide cost-effective and high quality products to satisfy my customers all over the world'
        ]);
    }
}
