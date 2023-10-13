<?php

namespace App\Http\Controllers\Site\Post;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\ReactionRepositoryInterface;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    private $repository;
    public function __construct(ReactionRepositoryInterface $reactionRepository)
    {
        $this->repository = $reactionRepository;
    }

    public function store_reaction(Request $request){
        return $this->repository->store_reaction($request);
    }

    public function remove_reaction(Request $request){
        return $this->repository->remove_reaction($request);
    }
}
