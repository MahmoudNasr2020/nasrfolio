<?php

namespace App\Providers;


use App\Http\Eloquent\Dashboard\AdminRepository;
use App\Http\Eloquent\Dashboard\InterviewRepository;
use App\Http\Eloquent\Dashboard\RoleRepository;
use App\Http\Eloquent\Dashboard\CategoryRepository;
use App\Http\Eloquent\Dashboard\ClientRepository;
use App\Http\Eloquent\Dashboard\DetailRepository;
use App\Http\Eloquent\Dashboard\PostRepository;
use App\Http\Eloquent\Dashboard\ProjectRepository;
use App\Http\Eloquent\Dashboard\ResumeRepository;
use App\Http\Eloquent\Dashboard\ServiceRepository;
use App\Http\Eloquent\Dashboard\SkillRepository;
use App\Http\Eloquent\Dashboard\UserRepository;
use App\Http\Eloquent\Site\AuthRepository;
use App\Http\Eloquent\Site\CommentRepository;
use App\Http\Eloquent\Site\HomeRepository;
use App\Http\Eloquent\Site\RatingRepository;
use App\Http\Eloquent\Site\ReactionRepository;
use App\Http\Interfaces\Dashboard\AdminRepositoryInterface;
use App\Http\Interfaces\Dashboard\CategoryRepositoryInterface;
use App\Http\Interfaces\Dashboard\ClientRepositoryInterface;
use App\Http\Interfaces\Dashboard\DetailRepositoryInterface;
use App\Http\Interfaces\Dashboard\InterviewRepositoryInterface;
use App\Http\Interfaces\Dashboard\PostRepositoryInterface;
use App\Http\Interfaces\Dashboard\ProjectRepositoryInterface;
use App\Http\Interfaces\Dashboard\ResumeRepositoryInterface;
use App\Http\Interfaces\Dashboard\RoleRepositoryInterface;
use App\Http\Interfaces\Dashboard\ServiceRepositoryInterface;
use App\Http\Interfaces\Dashboard\SkillRepositoryInterface;
use App\Http\Interfaces\Dashboard\UserRepositoryInterface;
use App\Http\Interfaces\Site\AuthRepositoryInterface;
use App\Http\Interfaces\Site\CommentRepositoryInterface;
use App\Http\Interfaces\Site\HomeRepositoryInterface;
use App\Http\Interfaces\Site\RatingRepositoryInterface;
use App\Http\Interfaces\Site\ReactionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(DetailRepositoryInterface::class,DetailRepository::class);
        $this->app->bind(SkillRepositoryInterface::class,SkillRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(ResumeRepositoryInterface::class,ResumeRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class,ServiceRepository::class);
        $this->app->bind(ProjectRepositoryInterface::class,ProjectRepository::class);
        $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);
        $this->app->bind(\App\Http\Interfaces\Dashboard\AuthRepositoryInterface::class,\App\Http\Eloquent\Dashboard\AuthRepository::class);
        $this->app->bind(HomeRepositoryInterface::class,HomeRepository::class);
        $this->app->bind(\App\Http\Interfaces\Site\ProjectRepositoryInterface::class,\App\Http\Eloquent\Site\ProjectRepository::class);
        $this->app->bind(\App\Http\Interfaces\Site\PostRepositoryInterface::class,\App\Http\Eloquent\Site\PostRepository::class);
        $this->app->bind(AuthRepositoryInterface::class,AuthRepository::class);
        $this->app->bind(RatingRepositoryInterface::class,RatingRepository::class);
        $this->app->bind(ReactionRepositoryInterface::class,ReactionRepository::class);
        $this->app->bind(CommentRepositoryInterface::class,CommentRepository::class);
        $this->app->bind(InterviewRepositoryInterface::class,InterviewRepository::class);
    }


    public function boot()
    {
        //
    }
}
