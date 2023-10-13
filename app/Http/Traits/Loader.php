<?php


namespace App\Http\Traits;


use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

trait Loader
{

    public function post_loader($request)
    {
        $post_id = Crypt::decryptString($request->post_id);
        $comments = Comment::where('id','<',$request->id)->where('post_id',$post_id)->limit(6)->orderBy('id','desc')->get();
        $results = '';
        $id='';
        if ($request->dashboard == true)
        {
            if ($comments->count() > 0)
            {
                foreach ($comments as $comment)
                {
                    $id = $comment->id;
                    $delete='';
                    $delete = '<a href="#" class="comment-reply-link delete-comment delete-comment-'.$comment->id.'" data-id='.$comment->id.' style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                <i class="fa fa-trash-alt"></i>
                           </a>';

                    $timing = $comment->created_at->format('A') == "PM" ? 'م' : 'ص';
                    $results.='<li class="list-inline-item comment-item" style="display: block!important;" data-id='.$comment->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.$comment->user->image).'" alt="/" style="width: 65px;border-radius: 50%;">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    <span style="font-size: 16px"> '. $comment->user->name.' </span>

                                    <p class="text-muted">
                                        <a href="#">
                                            <span>'.$comment->created_at->format('M d,Y').'</span>
                                            <span>'.$comment->created_at->format('h:i').'
                                                <span style="float: right;margin-top: -3px;margin-left: 5px;">
                                                    '.$timing.'
                                                </span>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <p class="mb-0 comment-content-text-'.$comment->id.'" style="font-size: 17px;">'.$comment->comment.'</p>
                                '.$delete.'
                            </div>
                        </div>
                     </li>';
                }
            }
            return ['results'=>$results,'id'=>$id];
        }
        else
        {
            if ($comments->count() > 0)
            {
                foreach ($comments as $comment)
                {
                    $id = $comment->id;
                    $edit='';
                    $delete='';
                    if(Auth::check())
                    {
                        if($comment->user_id == Auth::user()->id)
                        {
                            $edit = ' <a href="#" class="comment-reply-link edit-comment edit-comment-'.$comment->id.'"
                                        data-id="'.$comment->id.'" data-comment="'.$comment->comment.'"
                                       style="color:green;position: relative;right: -16px;float: left;top: -23px;">
                                        <i class="fa fa-pen-alt"></i>
                                    </a>';

                            $delete = '<a href="#" class="comment-reply-link delete-comment delete-comment-'.$comment->id.'" data-id='.$comment->id.' style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                <i class="fa fa-trash-alt"></i>
                           </a>';

                        }
                    }
                    $name = Auth::check() ? Auth::user()->id == $comment->user_id ? 'أنت' : $comment->user->name : $comment->user->name;
                    $timing = $comment->created_at->format('A') == "PM" ? 'م' : 'ص';
                    $results.='<li class="list-inline-item comment-item" style="display: block!important;" data-id='.$comment->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.$comment->user->image).'" alt="/">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                   '.$name.'

                                    <p class="text-muted">
                                        <a href="#">
                                            <span>'.$comment->created_at->format('M d,Y').'</span>
                                            <span>'.$comment->created_at->format('h:i').'
                                                <span style="float: right;margin-top: 4px;margin-left: 5px;">
                                                    '.$timing.'
                                                </span>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <p class="mb-0 comment-content-text-'.$comment->id.'" ">'.$comment->comment.'</p>
                                '.$edit.'
                                '.$delete.'
                            </div>
                        </div>
                     </li>';
                }
            }
            return ['results'=>$results,'id'=>$id];

        }

    }


    public function project_loader($request)
    {
        $project_id = Crypt::decryptString($request->project_id);
        $results = '';

        if($request->dashboard==true)
        {
            $ratings = Rating::where('id','<',$request->id)->where('project_id',$project_id)->limit(9)->get();
            if ($ratings->count() > 0)
            {
                $id='';
                foreach ($ratings as $rating)
                {
                    $id = $rating->id;
                    $rating_num = $rating->rating;
                    $timing = $rating->created_at->format('A') == "PM" ? 'م' : 'ص';
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
                    $results.='<li class="list-inline-item rating-item" style="display: block!important;" data-id='.$rating->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.$rating->user->image).'" alt="/" style="width: 65px;border-radius: 50%;">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                   '.$rating->user->name.'
                                    '.$star.'
                                    <p class="text-muted">
                                        <a href="#">
                                            <span>'.$rating->created_at->format('M d,Y').'</span>
                                            <span>'.$rating->created_at->format('h:i').'
                                                <span style="float: right;margin-top: -3px;margin-left: 5px;">
                                                    '.$timing.'
                                                </span>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <p class="mb-0" style="font-size: 17px;">'.$rating->comment.'</p>

                                 <a href="#" class="comment-reply-link delete-rating delete-rating-'.$rating->id.'" data-id="'.$rating->id.'"
                               style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                <i class="fa fa-trash-alt"></i>
                            </a>

                            </div>
                        </div>
                     </li>';
                }
            }
            return ['results'=>$results,'id'=>$id];
        }
        else
        {
            $ratings = Rating::whereNotIn('id',$request->data)->where('project_id',$project_id)->limit(6)->get();
            if ($ratings->count() > 0)
            {
                foreach ($ratings as $rating)
                {
                    $rating_num = $rating->rating;
                    $timing = $rating->created_at->format('A') == "PM" ? 'م' : 'ص';
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
                    $results.='<li class="list-inline-item rating-item" style="display: block!important;" data-id='.$rating->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.$rating->user->image).'" alt="/">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                   '.$rating->user->name.'
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
                            </div>
                        </div>
                     </li>';
                }
            }
            return ['results'=>$results];
        }
    }
}
