<?php

namespace app\DesignPatterns;

use App\Http\Eloquent\CategoryRepository;
use App\Http\Eloquent\ClientRepository;
use App\Http\Eloquent\DetailRepository;
use App\Http\Eloquent\ProjectRepository;
use App\Http\Eloquent\ResumeRepository;
use App\Http\Eloquent\ServiceRepository;
use App\Http\Eloquent\SkillRepository;
use App\Http\Interfaces\CategoryRepositoryInterface;
use App\Http\Interfaces\ClientRepositoryInterface;
use App\Http\Interfaces\DetailRepositoryInterface;
use App\Http\Interfaces\ProjectRepositoryInterface;
use App\Http\Interfaces\ResumeRepositoryInterface;
use App\Http\Interfaces\ServiceRepositoryInterface;
use App\Http\Interfaces\SkillRepositoryInterface;

class Repository
{
    public function repository()
    {
        return [
            $this->app->bind(DetailRepositoryInterface::class,DetailRepository::class),
            $this->app->bind(SkillRepositoryInterface::class,SkillRepository::class),
            $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class),
            $this->app->bind(ResumeRepositoryInterface::class,ResumeRepository::class),
            $this->app->bind(ServiceRepositoryInterface::class,ServiceRepository::class),
            $this->app->bind(ProjectRepositoryInterface::class,ProjectRepository::class),
            $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class),
        ];
    }
}
