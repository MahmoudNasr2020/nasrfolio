<?php

namespace App\Http\Controllers\Site\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\CommentRepositoryInterface;
use App\Http\Requests\Site\Post\Comment\CommentRequest;
use App\Http\Requests\Site\Post\Comment\UpdateCommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $repository;
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->repository = $commentRepository;
    }

    public function store_comment(CommentRequest $request)
    {
        return $this->repository->store_comment($request);
    }

    public function edit_comment(UpdateCommentRequest $request)
    {
        return $this->repository->edit_comment($request);
    }

    public function loadMore(Request $request)
    {
        return $this->repository->loadMore($request);
    }

    public function delete(Request $request)
    {
        return $this->repository->delete($request);
    }
}
