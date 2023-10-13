<?php

namespace App\Http\Controllers\Dashboard\Resume;

use App\DataTables\ResumeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\ResumeRepositoryInterface;
use App\Http\Requests\Dashboard\Resume\ResumeRequest;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    private $repository;
    public function __construct(ResumeRepositoryInterface $resumeRepository)
    {
        $this->repository = $resumeRepository;
        $this->middleware('permission:عرض-سيرة-ذاتية,admin',['only'=>['index','status']]);
        $this->middleware('permission:اضافة-سيرة-ذاتية,admin',['only'=>['store']]);
        $this->middleware('permission:تعديل-سيرة-ذاتية,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-سيرة-ذاتية,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(ResumeDataTable $resumeDataTable)
    {
        return $this->repository->index($resumeDataTable);
    }

    public function store(ResumeRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(ResumeRequest $request,$id)
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
