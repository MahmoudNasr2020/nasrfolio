<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\ProjectRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Project;

class ProjectRepository implements ProjectRepositoryInterface
{
    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.projects.index');
    }

    public function show($id)
    {
        $project = Project::with(['ratings'=>function($q){
            return $q->limit(9)->orderBy('id','desc')->get();
        }])->find($id);
        if(!$project)
        {
            return abort(404);
        }
        return view('dashboard.pages.projects.container.front.show',['project'=>$project]);
    }

    public function create()
    {
       return view('dashboard.pages.projects.container.front.add');
    }

    public function store($request)
    {

        $data= $request->all();
        if($request->hasFile('image'))
        {
            $data['main_image'] = $this->imageUpload('projects',$request->image);
        }
        $project = Project::create($data);
        if(!$project)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if(!$project)
        {
            return abort(404);
        }
        return view('dashboard.pages.projects.container.front.edit',['project'=>$project]);
    }

    public function update($request,$id)
    {
        $project = Project::find($id);
        if(!$project)
        {
            return abort(404);
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {

            $this->deleteImage('dashboard/images/'.$project->main_image);
            $data['main_image'] = $this->imageUpload('projects',$request->image);
        }
        $update = $project->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $project = Project::find($id);
        if(!$project)
        {
            return 'not_found';
        }
        $this->deleteImage('dashboard/images/'.$project->main_image);
        $project->ratings()->delete();
        $project->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  Project::where('id',$item)->first();
            if($item)
            {
                $this->deleteImage('dashboard/images/'.$item->main_image);
                $item->delete();
                $item->ratings()->delete();
            }
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $project = Project::find($request->id);
        if(!$project)
        {
            return 'not_found';
        }
        $project->update(['status'=>$request->status]);
        return 'done';
    }

    public function multi_images($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('dashboard.pages.projects.container.front.multi_images')->with(['project_id'=>$project_id,'images'=>json_decode($project->images)]);
    }

    public function upload_multi_images($request)
    {
        $project = Project::findOrFail($request->project_id);
        $images = [];
        if($project->images != null)
        {
            $images = json_decode($project->images);
        }

        if($request->hasFile('file'))
        {
            $image = $this->imageUpload('projects',$request->file);
            array_push($images,$image);
            $project->update(['images'=>json_encode($images)]);
            return response()->json(['image'=>$image,'status'=>'success','code'=>200]);
        }
    }

    public function delete_image($request)
    {
         $project = Project::find($request->project_id);
        if(!$project)
        {
            return response()->json(['status'=>'not_found','code'=>404]);
        }
         $images = json_decode($project->images);
         $new_images = [];
        foreach ($images as $image)
        {
            if ($image != $request->image)
            {
                array_push($new_images,$image);
               // unset($images[$key]);
                //array_splice($images,$key);
            }
            else
            {
                $this->deleteImage('dashboard/images/'.$image);
            }
        }

        $project->update(['images'=>$new_images ? json_encode($new_images) : null]);
        return response()->json(['status'=>'success','code'=>200]);
    }

    public function video($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('dashboard.pages.projects.container.front.video')->with(['project_id'=>$project_id,'video'=>$project->video]);
    }

    public function upload_video($request)
    {
        $project = Project::findOrFail($request->project_id);
        $video = $this->imageUpload('projects',$request->file);
        $project->update(['video'=>$video]);
        return response()->json(['video'=>$project->video,'status'=>'success','code'=>200]);
    }

    public function delete_video($request)
    {
         $project = Project::find($request->project_id);
        if(!$project)
        {
            return response()->json(['status'=>'not_found','code'=>404]);
        }
        $this->deleteImage('dashboard/images/'.$project->video);
        $project->update(['video'=>null]);
        return response()->json(['status'=>'success','code'=>200]);
    }
}
