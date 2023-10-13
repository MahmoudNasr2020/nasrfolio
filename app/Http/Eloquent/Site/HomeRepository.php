<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\HomeRepositoryInterface;
use App\Models\Category;
use App\Models\Client;
use App\Models\Post;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Skill;

class HomeRepository implements HomeRepositoryInterface
{

    public function index()
    {
        $data = [];
        $data['skills']   =  Skill::where('status','enable')->get();
        $data['categories']  =  Category::where('status','enable')->get();
        $data['resumes'] = Resume::count();
        $data['services'] =  Service::where('status','enable')->get();
        $data['projects'] =  Project::where('status','enable')->limit(3)->orderBy('id','desc')->get();
        $data['clients']  =  Client::where('status','enable')->orderBy('id','desc')->get();
        $data['posts']    =  Post::where('status','enable')->limit(3)->orderBy('id','desc')->get();
        // return $data;
        return view('site.index',compact('data'));
    }
}
