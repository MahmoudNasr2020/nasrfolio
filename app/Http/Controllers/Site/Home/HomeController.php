<?php

namespace App\Http\Controllers\Site\Home;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Client;
use App\Models\Detail;
use App\Models\Post;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    private $repository;
    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->repository = $homeRepository;
    }
    public function index()
    {
        return $this->repository->index();
    }
}
