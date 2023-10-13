<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\CategoryRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.category.index');
    }


    public function store($request)
    {
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('categories',$request->image);
        }
        $category = Category::create($data);
        if(!$category)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return 'not_found';
        }
        return $category;
    }

    public function update($request,$id)
    {

         $category = Category::find($id);
        if(!$category)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteImage('dashboard/images/'.$category->image);
            $data['image'] = $this->imageUpload('categories',$request->image);
        }
        $update = $category->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return 'not_found';
        }
        $this->deleteImage('dashboard/images/'.$category->image);
        $category->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  Category::where('id',$item)->first();
            if($item)
            {
                $this->deleteImage('dashboard/images/'.$item->image);
                $item->delete();
            }
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $category = Category::find($request->id);
        if(!$category)
        {
            return 'not_found';
        }
        $category->update(['status'=>$request->status]);
        return 'done';
    }


}
