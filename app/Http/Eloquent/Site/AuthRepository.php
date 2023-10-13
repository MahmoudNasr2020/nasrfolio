<?php


namespace App\Http\Eloquent\Site;


use App\Http\Interfaces\Site\AuthRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository implements AuthRepositoryInterface
{
    use Image;
    public function register($request)
    {
       $user = User::create(['name'=>$request->name,'email'=>$request->email,'password'=>Hash::make($request->password)]);
       if(!$user)
       {
           return back()->with(['error'=>'حدث خطأ']);
       }
       Auth::login($user);
       return redirect('/');
    }
    public function login($request)
    {
        if ($user = Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            //Auth::login($user);
            return redirect('/');
        }
        return back()->with(['errorLogin'=>'البيانات غير صالحة']);
    }


    public function edit_profile($request)
    {
        $user = User::find($request->id);
        if(!$user)
        {
            return 'not_found';
        }
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteExceptDefaultImage('dashboard/images/'.$user->image);
            $data['image'] = $this->imageUpload('users',$request->image);
        }
        if ($request->has('password'))
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }

        $update = $user->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }

    public function logout()
    {
      Auth::logout();
      return redirect( '/');
    }
}
