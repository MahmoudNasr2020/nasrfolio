<?php

namespace App\Http\Controllers\Dashboard\Post;

use App\DataTables\PostDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\PostRepositoryInterface;
use App\Http\Requests\Dashboard\Post\AddPostRequest;
use App\Http\Requests\Dashboard\Post\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $repository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repository = $postRepository;
        $this->middleware('permission:عرض-بوست,admin',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-بوست,admin',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-بوست,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-بوست,admin',['only'=>['delete','multi_delete']]);
    }

    public function index(PostDataTable $postDataTable)
    {
        return $this->repository->index($postDataTable);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddPostRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdatePostRequest $request,$id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete($request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
