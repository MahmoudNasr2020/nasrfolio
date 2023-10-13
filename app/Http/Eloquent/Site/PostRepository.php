<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\PostRepositoryInterface;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PostRepository implements PostRepositoryInterface
{
    public function posts()
    {
        $posts = Post::where('status','enable')->orderBy('id','desc')->limit(9)->get();
        return view('site.pages.post.posts',compact('posts'));

    }

    public function loadMore($request)
    {
        $id = Crypt::decryptString($request->id);
        $posts = Post::where('id','<',$id)->where('status','enable')->orderBy('id','desc')->limit(9)->get();
        $results='';
        if($posts->count() > 0)
        {
            $id='';
            foreach ($posts as $post)
            {
                $id = $post->id;
                $results.=' <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="'.asset('dashboard/images/'.$post->main_image).'" alt="/" height="215px">
                            </div>
                            <div class="blog-box">
                                <div class="blog-time">'.$post->created_at->format('Y M d').'</div>
                                <h5 class="Blog-title mb-0">
                                    <a href="javascript:void(0)">'.$post->title.'</a>
                                </h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-user-alt base-color"></i>
                                            <span >'.$request->name.'</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript:void(0)">
                                            <i class="fas fa-comment base-color"></i>
                                            <span >5</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="blog-link">
                                    <a href="">قراءة</a>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            return ['results'=>$results,'id'=> Crypt::encryptString($id) ];
        }
        return $results;
    }


    public function single_post($id)
    {
        $id = Crypt::decryptString($id);
        $post = Post::with('reactions')->findOrFail($id);
        $user_id =Auth::check() ? Auth::user()->id : '';
        $comments = Comment::where('post_id',$post->id)->orderBy('id','desc')->limit(6)->get();

         $posts = Post::where('status','enable')->where('id','!=',$id)->orderBy('id','desc')->limit(3)->get();

        if($post->status == 'disable')
        {
            return abort(404);
        }
        return view('site.pages.post.single-post',compact('post','posts','comments'));
    }
}
