<?php

namespace App\Http\Controllers\Dashboard\Project;

use App\DataTables\ProjectDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\ProjectRepositoryInterface;
use App\Http\Requests\Dashboard\Project\AddProjectRequest;
use App\Http\Requests\Dashboard\Project\MultiImageRequest;
use App\Http\Requests\Dashboard\Project\UpdateProjectRequest;
use App\Http\Requests\Dashboard\Project\VideoRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $repository;
    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->repository = $projectRepository;
        $this->middleware('permission:عرض-مشروع,admin',['only'=>['index','show','status','multi_images','video']]);
        $this->middleware('permission:اضافة-مشروع,admin',['only'=>['create','store','upload_multi_images','upload_video']]);
        $this->middleware('permission:تعديل-مشروع,admin',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-مشروع,admin',['only'=>['delete','multi_delete','delete_image','delete_video']]);
    }
    public function index(ProjectDataTable $projectDataTable)
    {
        return $this->repository->index($projectDataTable);
    }

    public function show($id,$name)
    {
        return $this->repository->show($id);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddProjectRequest $request)
    {
        return $this->repository->store($request);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdateProjectRequest $request,$id)
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

    public function multi_images($project_id)
    {
        return $this->repository->multi_images($project_id);
    }

    public function upload_multi_images(MultiImageRequest $request)
    {
        return $this->repository->upload_multi_images($request);
    }

    public function delete_image(Request $request)
    {
        return $this->repository->delete_image($request);
    }

    public function video($project_id)
    {
        return $this->repository->video($project_id);
    }

    public function upload_video(VideoRequest $request)
    {
        return $this->repository->upload_video($request);
    }

    public function delete_video(Request $request)
    {
        return $this->repository->delete_video($request);
    }
}
