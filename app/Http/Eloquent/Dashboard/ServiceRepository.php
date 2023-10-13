<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\ServiceRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{

    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.services.index');
    }


    public function store($request)
    {
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('services',$request->image);
        }
        $service = Service::create($data);
        if(!$service)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $service = Service::find($id);
        if(!$service)
        {
            return 'not_found';
        }
        return $service;
    }

    public function update($request,$id)
    {

        $service = Service::find($id);
        if(!$service)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteImage('dashboard/images/'.$service->image);
            $data['image'] = $this->imageUpload('services',$request->image);
        }
        $update = $service->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $service = Service::find($id);
        if(!$service)
        {
            return 'not_found';
        }
        $this->deleteImage('dashboard/images/'.$service->image);
        $service->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  Service::where('id',$item)->first();
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
        $service = Service::find($request->id);
        if(!$service)
        {
            return 'not_found';
        }
        $service->update(['status'=>$request->status]);
        return 'done';
    }
}
