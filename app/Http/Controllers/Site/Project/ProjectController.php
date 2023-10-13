<?php

namespace App\Http\Controllers\site\Project;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProjectController extends Controller
{
    private $repository;
    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->repository = $projectRepository;
    }

    public function projects(){
        return $this->repository->projects();
    }
    public function loadMore(Request $request){
        return $this->repository->loadMore($request);
    }
    public function single_project($name,$id){
        return $this->repository->single_project($id);
    }
}
