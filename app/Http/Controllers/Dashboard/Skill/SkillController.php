<?php

namespace App\Http\Controllers\Dashboard\Skill;

use App\DataTables\SkillDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\SkillRepositoryInterface;
use App\Http\Requests\Dashboard\Skill\Skill_Description;
use App\Http\Requests\Dashboard\Skill\SkillRequest;
use App\Http\Requests\Dashboard\Skill\UpdateSkillRequest;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    private $repository;
    public function __construct(SkillRepositoryInterface $skillRepository)
    {
        $this->repository = $skillRepository;
        $this->middleware('permission:عرض-مهارة,admin',['only'=>['index','status']]);
        $this->middleware('permission:اضافة-مهارة,admin',['only'=>['store']]);
        $this->middleware('permission:تعديل-مهارة,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-مهارة,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(SkillDataTable $skillDataTable)
    {
        return $this->repository->index($skillDataTable);
    }

    public function store(SkillRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($uuid)
    {
        return $this->repository->edit($uuid);
    }

    public function update(UpdateSkillRequest $request,$id)
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

    public function textSkill(Skill_Description $request)
    {
        return $this->repository->textSkill($request);
    }
}
