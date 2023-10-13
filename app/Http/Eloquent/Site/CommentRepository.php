<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\CommentRepositoryInterface;
use App\Http\Traits\Loader;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CommentRepository implements CommentRepositoryInterface
{
    use Loader;
    public function store_comment($request)
    {
            $comment = Comment::create([
                'comment'=>$request->comment,
                'user_id' => Auth::user()->id,
                'post_id' => Crypt::decryptString($request->post_id)
            ]);

            if(!$comment)
            {
                return 'error';
            }
            $edit='';
            $delete = '';

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
            $timing = $comment->created_at->format('A') == "PM" ? 'م' : 'ص';
            $result = '<li class="list-inline-item comment-item" style="display: block!important;" data-id='.$comment->id.'>
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="'.asset('dashboard/images/'.Auth::user()->image).'" alt="/">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    أنت
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
                                <p class="mb-0 comment-content-text-'.$comment->id.'" >'.$comment->comment.'</p>
                                   '.$edit.'
                                   '.$delete.'
                            </div>
                        </div>
                     </li>';

            return ['result'=>$result,'status'=>'done'];


        return 0;

    }

    public function edit_comment($request)
    {
        $comment = Comment::find($request->id);

        if(!$comment)
        {
            return 'error';
        }
       $update =  $comment->update([
            'comment'=>$request->comment,
        ]);
        if(!$update)
        {
            return 'error';
        }

        return ['status'=>'done','id'=>$comment->id];

    }

    public function loadMore($request)
    {
        return $this->post_loader($request);
    }


    public function delete($request)
    {
        $comment = Comment::find($request->id);
       // $project_id = $rating->project_id;
        if (!$comment)
        {
            return ['status'=>'not_found'];
        }
        $comment->delete();
        return ['status'=>'done'];
    }
}
