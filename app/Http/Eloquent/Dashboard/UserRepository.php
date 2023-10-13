<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\UserRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    use Image;
    public function index($datatable)
    {
        return $datatable->render('dashboard.pages.users.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if(!$user)
        {
            return 'not_found';
        }
        $this->deleteExceptDefaultImage('dashboard/images/'.$user->image);
        $user->reactions()->delete();
        $user->comments()->delete();
        $user->ratings()->delete();
        $user->delete();
        return 'done';

    }

    public function multi_delete($data)
    {
        foreach ($data as $item)
        {
            $item =  User::where('id',$item)->first();
            if($item)
            {
                $this->deleteExceptDefaultImage('dashboard/images/'.$item->image);
                $item->reactions()->delete();
                $item->comments()->delete();
                $item->ratings()->delete();
                $item->delete();
            }
        }
        //Skill::whereIn('id',$data)->delete();
        return 'done';
    }
}
