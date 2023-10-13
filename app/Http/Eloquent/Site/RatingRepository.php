<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\RatingRepositoryInterface;
use App\Http\Traits\Loader;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RatingRepository implements RatingRepositoryInterface
{

    use Loader;
    public function store_rating($request)
    {
        $rating_exists = Rating::where(['user_id'=>Auth::user()->id,'project_id' => Crypt::decryptString($request->project_id)])->first();
        if(!$rating_exists)
        {
            $rating = Rating::create([
                'rating'=>$request->rating,
                'comment'=>$request->comment,
                'user_id' => Auth::user()->id,
                'project_id' => Crypt::decryptString($request->project_id)
            ]);

            if(!$rating)
            {
                return 'error';
            }
            $rating_num = $rating->rating;
            $star ='';
            for($i=1;$i<=5;$i++)
            {
                if ($i<=$rating_num)
                {
                    $star.=' <span class="fa fa-star checked" style="color: orange"></span>';
                }
                else
                {
                    $star.=' <span class="fa fa-star"></span>';
                }

            }

            $delete = '';
            if(Auth::check())
            {
                if($rating->user_id == Auth::user()->id)
                {
                    $delete = '<a href="#" class="comment-reply-link delete-rating" data-id='.$rating->id.' style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                <i class="fa fa-trash-alt"></i>
                           </a>';

                }
            }
            $timing = $rating->created_at->format('A') == "PM" ? 'م' : 'ص';
            $result = '<li class="list-inline-item rating-item" style="display: block!important;" data-id='.$rating->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.Auth::user()->image).'" alt="/">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    أنت  (مثبت)
                                    '.$star.'
                                    <p class="text-muted">
                                        <a href="#">
                                            <span>'.$rating->created_at->format('M d,Y').'</span>
                                            <span>'.$rating->created_at->format('h:i').'
                                                <span style="float: right;margin-top: 4px;margin-left: 5px;">
                                                    '.$timing.'
                                                </span>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <p class="mb-0">'.$rating->comment.'</p>
                                   '.$delete.'
                            </div>
                        </div>
                     </li>';

            return ['result'=>$result,'status'=>'done'];
        }

       return 0;

    }

    public function loadMore($request)
    {
        return $this->project_loader($request);
    }


    public function delete($request)
    {
         $rating = Rating::find($request->id);
         $project_id = $rating->project_id;
        if (!$rating)
        {
            return ['status'=>'not_found'];
        }
        $rating->delete();
        return ['project_id'=>Crypt::encryptString($project_id),'status'=>'done'];
    }
}
