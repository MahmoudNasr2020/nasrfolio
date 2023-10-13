<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\SkillRepositoryInterface;
use App\Models\Skill;
use App\Models\Skill_Description;

class SkillRepository implements SkillRepositoryInterface
{
    public function index($datatable)
    {
        $skills = Skill::all();
        $skill_desc = Skill_Description::orderBy('id','desc')->first();
        return $datatable->render('dashboard.pages.skills.index',['skills'=>$skills,'skill_desc'=>$skill_desc]);
    }


    public function store($request)
    {

        if($request->add_skill == null)
        {
            return 'error';
        }
        foreach ($request->add_skill as $key=>$item)
        {
            $skill = Skill::where('name',$item['name'])->first();
            if(!$skill)
            {
                Skill::create([
                    'name'=>$item['name'],
                    'percent' => $item['percent'],

                ]);
            }
        }
        return 'done';
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        if(!$skill)
        {
            return 'not_found';
        }
        return $skill;
    }

    public function update($request,$id)
    {

        $skill = Skill::find($id);
        if(!$skill)
        {
            return 'not_found';
        }
        $update = $skill->update([
            'name'=>$request->name,
            'percent' => $request->percent,
        ]);
        if(!$update)
        {
            return 'error';
        }
        return 'done';

    }

    public function delete($id)
    {
        $skill = Skill::find($id);
        if(!$skill)
        {
            return 'not_found';
        }
        $skill->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        /*foreach ($data as $item)
        {
            $item =  Skill::where('id',$item)->first();
            if($item)
            {
                $item->delete();
            }
        }*/
         Skill::whereIn('id',$data)->delete();
        return 'done';
    }

    public function status($request)
    {
        $skill = Skill::find($request->id);
        if(!$skill)
        {
            return 'not_found';
        }
        $skill->update(['status'=>$request->status]);
        return 'done';
    }

    public function textSkill($request)
    {
        $text_skill = Skill_Description::orderBy('id','desc')->first();
        if(!$text_skill)
        {
            return 'not_found';
        }
        $update = Skill_Description::orderBy('id','desc')->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }
}
