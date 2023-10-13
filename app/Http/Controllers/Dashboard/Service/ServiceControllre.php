<?php

namespace App\Http\Controllers\Dashboard\Service;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\ServiceRepositoryInterface;
use App\Http\Requests\Dashboard\Service\AddServiceRequest;
use App\Http\Requests\Dashboard\Service\UpdateServiceRequest;
use Illuminate\Http\Request;

class ServiceControllre extends Controller
{
    private $repository;
    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->repository = $serviceRepository;
        $this->middleware('permission:عرض-خدمة,admin',['only'=>['index','status']]);
        $this->middleware('permission:اضافة-خدمة,admin',['only'=>['store']]);
        $this->middleware('permission:تعديل-خدمة,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-خدمة,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(ServiceDataTable $serviceDataTable)
    {
        return $this->repository->index($serviceDataTable);
    }

    public function store(AddServiceRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdateServiceRequest $request,$id)
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
