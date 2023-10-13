<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class QautoDaily extends Command
{

    protected $signature = 'qauto:daily';


    protected $description = 'qauto daily make';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        return info('Mahmoud Nasr');
    }
}
