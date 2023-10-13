<?php

namespace App\Http\Controllers\Site\Post;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\PostRepositoryInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $repository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repository = $postRepository;
    }

    public function posts(){
        return $this->repository->posts();
    }
    public function loadMore(Request $request){
        return $this->repository->loadMore($request);
    }

    public function single_post($title,$id){
        return $this->repository->single_post($id);
    }
}
