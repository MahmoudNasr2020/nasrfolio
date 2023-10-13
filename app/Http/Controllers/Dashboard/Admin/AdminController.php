<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\DataTables\AdminDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\AdminRepositoryInterface;
use App\Http\Requests\Dashboard\Admin\AddAdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $repository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->repository = $adminRepository;
        $this->middleware('permission:عرض-ادمن,admin',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-ادمن,admin',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-ادمن,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-ادمن,admin',['only'=>['delete','multi_delete']]);
    }

    public function index(AdminDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddAdminRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateAdminRequest $request, $id)
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
