<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\ClientRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Client;
use App\Models\Service;

class ClientRepository implements ClientRepositoryInterface
{

    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.clients.index');
    }


    public function store($request)
    {
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $data['image'] = $this->imageUpload('clients',$request->image);
        }
        $client = Client::create($data);
        if(!$client)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $client = Client::find($id);
        if(!$client)
        {
            return 'not_found';
        }
        return $client;
    }

    public function update($request,$id)
    {

        $client = Client::find($id);
        if(!$client)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteExceptDefaultImage('dashboard/images/'.$client->image);
            $data['image'] = $this->imageUpload('clients',$request->image);
        }
        $update = $client->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $client = Client::find($id);
        if(!$client)
        {
            return 'not_found';
        }
        $this->deleteExceptDefaultImage('dashboard/images/'.$client->image);
        $client->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  Client::where('id',$item)->first();
            if($item)
            {
                $this->deleteExceptDefaultImage('dashboard/images/'.$item->image);
                $item->delete();
            }
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $client = Client::find($request->id);
        if(!$client)
        {
            return 'not_found';
        }
        $client->update(['status'=>$request->status]);
        return 'done';
    }
}
