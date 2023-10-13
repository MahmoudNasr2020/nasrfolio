<?php

namespace App\Http\Controllers\Dashboard\Role;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\RoleRepositoryInterface;
use App\Http\Requests\Dashboard\Role\AddRoleRequest;
use App\Http\Requests\Dashboard\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $repository;

    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('permission:عرض-صلاحية,admin',['only'=>['index','show']]);
        $this->middleware('permission:اضافة-صلاحية,admin',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-صلاحية,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-صلاحية,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(RoleDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddRoleRequest $request)
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

    public function update(UpdateRoleRequest $request,$id)
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

}
