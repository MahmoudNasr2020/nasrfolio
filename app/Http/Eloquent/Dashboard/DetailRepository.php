<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\DetailRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Admin;
use App\Models\Detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DetailRepository implements DetailRepositoryInterface
{
    use Image;
    public function index()
    {
        $data = Detail::first();
        return view('dashboard.pages.details.index',['data'=>$data]);
    }

    public function update($request)
    {
        $detail = Detail::orderBy('id','desc')->first();
        if(!$detail)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteImage('dashboard/images/'.$detail->image);
            $data['image'] = $this->imageUpload('details',$request->image);
        }

        if($request->hasFile('cv'))
        {
            $this->deleteImage('dashboard/images/'.$detail->cv);
            $data['cv'] = $this->imageUpload('details',$request->cv);
        }
        $update = Detail::orderBy('id','desc')->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }

    public function setting($request)
    {
        $detail = Detail::orderBy('id','desc')->first();
        if(!$detail)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('site_image'))
        {
            $this->deleteImage('dashboard/images/'.$detail->site_image);
            $data['site_image'] = $this->imageUpload('details',$request->site_image);
        }

        $update = Detail::orderBy('id','desc')->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }

    public function profile($request)
    {
        $admin = Admin::where('id',Auth::user()->id)->first();
        if(!$admin)
        {
            return 'not_found';
        }
        $data= $request->all();
        if($request->hasFile('image'))
        {
            $this->deleteExceptDefaultImage('dashboard/images/'.$admin->image);
            $data['image'] = $this->imageUpload('admins',$request->image);
        }

        if ($request->has('password') && $request->password != '')
        {
            $data['password'] = Hash::make($request->password);
        }
        else
        {
            unset($data['password']);
        }

        $update = $admin->update($data);
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }
}
