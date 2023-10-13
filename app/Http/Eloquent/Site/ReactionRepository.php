<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\ReactionRepositoryInterface;
use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReactionRepository implements ReactionRepositoryInterface
{

    public function store_reaction($request)
    {
        $post = Post::select('id')->find(Crypt::decryptString($request->post_id));
        if($post)
        {
            $reaction = Reaction::updateOrCreate(
                [
                'user_id'=>Auth::user()->id,
                'post_id' => $post->id],
                ['reaction' => $request->reaction]);

            if(!$reaction)
            {
                return 0;
            }
            return 'done';
        }
        return 0;

    }

    public function remove_reaction($request)
    {
        $post = Post::select('id')->find(Crypt::decryptString($request->post_id));
        if($post)
        {
            $reaction = Reaction::where(['post_id'=>$post->id,'user_id'=>Auth::user()->id])->first();

            if(!$reaction)
            {
                return 0;
            }
            $reaction->delete();
            return 'done';
        }
        return 0;
    }
}
