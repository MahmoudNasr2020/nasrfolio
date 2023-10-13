<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\PostRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.posts.index');
    }

    public function show($id)
    {
        $post = Post::with(['comments'=>function($q){
            return $q->limit(9)->orderBy('id','desc')->get();
        }])->find($id);
        if(!$post)
        {
            return abort(404);
        }
        return view('dashboard.pages.posts.container.front.show',['post'=>$post]);
    }

    public function create()
    {
       return view('dashboard.pages.posts.container.front.add');
    }

    public function store($request)
    {

        $data= $request->all();
        if($request->hasFile('image'))
        {
            $data['main_image'] = $this->imageUpload('posts',$request->image);
        }
        $post = Post::create($data);
        if(!$post)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return abort(404);
        }
        return view('dashboard.pages.posts.container.front.edit',['post'=>$post]);
    }

    public function update($request,$id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return abort(404);
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {

            $this->deleteImage('dashboard/images/'.$post->main_image);
            $data['main_image'] = $this->imageUpload('posts',$request->image);
        }
        $update = $post->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return 'not_found';
        }
        $this->deleteImage('dashboard/images/'.$post->main_image);
        $post->comments()->delete();
        $post->reactions()->delete();
        $post->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  Post::where('id',$item)->first();
            if($item)
            {
                $this->deleteImage('dashboard/images/'.$item->main_image);
                $item->comments()->delete();
                $item->reactions()->delete();
                $item->delete();
            }
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $post = Post::find($request->id);
        if(!$post)
        {
            return 'not_found';
        }
        $post->update(['status'=>$request->status]);
        return 'done';
    }


}
