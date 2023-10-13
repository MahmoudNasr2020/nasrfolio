<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProjectRepository implements ProjectRepositoryInterface
{

    public function projects()
    {
        $projects = Project::where('status','enable')->orderBy('id','desc')->limit(9)->get();
        return view('site.pages.project.projects',compact('projects'));

    }

    public function loadMore($request)
    {
        $id = Crypt::decryptString($request->id);
        $projects = Project::where('id','<',$id)->where('status','enable')->orderBy('id','desc')->limit(9)->get();
        $results='';
        if($projects->count() > 0)
        {
            $id='';
            foreach ($projects as $project)
            {
                $id = $project->id;
                $results.=' <div class="col-md-6 col-lg-4 mt-5">
                                <div class="portfolio-box">
                                    <div class="portfolio-img">
                                        <img src="'.asset('dashboard/images/'.$project->main_image).'" alt="/" height="350px">
                                    </div>
                                    <div class="portfolio-overlay">
                                        <div class="portfolio-overlay-content">
                                            <h5 class="portfolio-category">'.$project->name.'</h5>
                                            <div class="portfolio-icon">
                                                <a href="portfolio-single-colorful-rtl.html">
                                                    <i class="fas fa-link"></i>
                                                </a>
                                                <a href="'.asset('dashboard/images/'.$project->main_image).'" class="js-zoom-gallery">
                                                    <i class="fas fa-search-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                         </div>';
            }
            return ['results'=>$results,'id'=> Crypt::encryptString($id) ];
        }
        return $results;
    }


    public function single_project($id)
    {
        $id = Crypt::decryptString($id);
        $user_id =Auth::check() ? Auth::user()->id : '';
        $project = Project::findOrFail($id);
        $ratings = Rating::where('user_id','!=',$user_id)->where('project_id',$project->id)->orderBy('id','desc')->limit(6)->get();
        if($rating_auth = Rating::where('user_id',$user_id)->where('project_id',$project->id)->first())
        {
            $ratings->prepend($rating_auth);
        }
        //return $ratings;
        $projects = Project::where('status','enable')->where('id','!=',$id)->orderBy('id','desc')->limit(3)->get();
        if($project->status == 'disable')
        {
            return abort(404);
        }
        return view('site.pages.project.single-project',compact('project','projects','ratings'));
    }
}
