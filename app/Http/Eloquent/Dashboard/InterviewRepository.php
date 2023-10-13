<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\InterviewRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Client;
use App\Models\Interview;

class InterviewRepository implements InterviewRepositoryInterface
{

    use Image;

    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.interview.index');
    }


    public function store($request)
    {
        $data= $request->all();
        $interview = Interview::create($data);
        if(!$interview)
        {
            return 'error';
        }
        return 'done';
    }

    public function edit($id)
    {
        $interview = Interview::find($id);
        if(!$interview)
        {
            return 'not_found';
        }
        return $interview;
    }

    public function update($request,$id)
    {

        $interview = Interview::find($id);
        if(!$interview)
        {
            return 'not_found';
        }
        $data= $request->all();
        $update = $interview->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $interview = Interview::find($id);
        if(!$interview)
        {
            return 'not_found';
        }
        $interview->delete();
        return 'done';

    }

    public function multi_delete($data)
    {

        foreach ($data as $item)
        {
            $item =  Interview::where('id',$item)->delete();
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }


}
