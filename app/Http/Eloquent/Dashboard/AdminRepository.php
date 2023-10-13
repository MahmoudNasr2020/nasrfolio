<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\AdminRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminRepository implements AdminRepositoryInterface
{
    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('dashboard.pages.admins.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('dashboard.pages.admins.container.front.add',compact('roles'));
    }

    public function store($request)
    {
        if($request->hasFile('photo'))
        {
            $image = $this->imageUpload('admins',$request->file('photo'));
            $request->request->add(['image'=>$image]);
        }
        $request->merge(['password'=>Hash::make($request->password)]);
        DB::beginTransaction();
        $admin = Admin::create($request->only(['name','email','password','status','image']));
        $roles = $admin->assignRole($request->roles);
        if (!$admin || !$roles)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }

    public function show($id)
    {
        $data = Admin::findOrFail($id);
        return view('dashboard.pages.admins.container.front.show',compact('data'));
    }

    public function edit($data)
    {
        $data = Admin::findOrFail($data);
        $roles = Role::get();
        $data_roles = $data->roles->pluck('name')->toArray();
        return view('dashboard.pages.admins.container.front.edit',compact('data','roles','data_roles'));
    }

    public function update($request,$id)
    {
        $data = Admin::find($id);
        if(!$data)
        {
            return 'error';
        }
        if($request->has('password') && $request->password != '')
        {
            $request->merge(['password'=>Hash::make($request->password)]);
        }
        if($request->hasFile('photo'))
        {
            $this->deleteExceptDefaultImage('dashboard/images/'.$data->image);
            $image = $this->imageUpload('admins',$request->file('photo'));
            $request->request->add(['image'=>$image]);
        }
        DB::beginTransaction();
        $user = $data->update($request->only(['name','email','password','status','image']));
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $roles = $data->assignRole($request->roles);
        if (!$user || !$roles)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';
    }

    public function delete($item)
    {
        $item = Admin::find($item);
        if(!$item)
        {
            return 'error';
        }
        $this->deleteExceptDefaultImage('dashboard/images/'.$item->image);
        DB::table('model_has_roles')->where('model_id',$item->id)->delete();
        $item->delete();
        return 'done';
    }



    public function multi_delete(array $data)
    {
        foreach ($data as $item)
        {
            $item = Admin::findOrFail($item);
            $this->deleteExceptDefaultImage('dashboard/images/'.$item->image);
            DB::table('model_has_roles')->where('model_id',$item->id)->delete();
            $item->delete();
        }
        return 'done';
    }

    public function status($request)
    {
        $data = Admin::find($request->id);

        if(!$data)
        {
            return 'error';
        }

        $data->update(['status'=>$request->status]);
        return 'done';
    }
}
