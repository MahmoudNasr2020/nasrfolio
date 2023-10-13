<?php

namespace App\Http\Controllers\Dashboard\Resume\Category;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\CategoryRepositoryInterface;
use App\Http\Requests\Dashboard\Resume\Category\AddCategoryRequest;
use App\Http\Requests\Dashboard\Resume\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $repository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
        $this->middleware('permission:عرض-قسم,admin',['only'=>['index','status']]);
        $this->middleware('permission:اضافة-قسم,admin',['only'=>['store']]);
        $this->middleware('permission:تعديل-قسم,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-قسم,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(CategoryDataTable $categoryDataTable)
    {
        return $this->repository->index($categoryDataTable);
    }

    public function store(AddCategoryRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdateCategoryRequest $request,$id)
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
