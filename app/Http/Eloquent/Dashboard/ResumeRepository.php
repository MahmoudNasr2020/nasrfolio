<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\ResumeRepositoryInterface;
use App\Models\Category;
use App\Models\Resume;

class ResumeRepository implements ResumeRepositoryInterface
{

    public function index($datatable)
    {
        $categories = Category::orderBy('id','desc')->get();
        return $datatable->render('dashboard.pages.resume.index',['categories'=>$categories]);
    }


    public function store($request)
    {
        $data = [
            'title'=>$request->title,
            'date'=>$request->date,
            'description'=> $request->description,
            'points' => $request->points,
            'category_id'=>$request->category_id
            ];
        $resume = Resume::create($data);
        if(!$resume)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $resume = Resume::find($id);
        if(!$resume)
        {
            return 'not_found';
        }
        return $resume;
    }

    public function update($request,$id)
    {

        $resume = Resume::find($id);
        if(!$resume)
        {
            return 'not_found';
        }
        $data = [
            'title'=>$request->title,
            'date'=>$request->date,
            'description'=> $request->description,
            'points' => $request->points,
            'category_id'=>$request->category_id
        ];
        $update = $resume->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $resume = Resume::find($id);
        if(!$resume)
        {
            return 'not_found';
        }
        $resume->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
       /* foreach ($data as $item)
        {
            $item =  Category::where('id',$item)->first();
            if($item)
            {
                $this->deleteImage('dashboard/images/'.$item->image);
                $item->delete();
            }
        }*/
        Resume::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $resume = Resume::find($request->id);
        if(!$resume)
        {
            return 'not_found';
        }
        $resume->update(['status'=>$request->status]);
        return 'done';
    }
}
