<?php


namespace App\Http\Eloquent\Dashboard;


use App\Http\Interfaces\Dashboard\RoleRepositoryInterface;
use App\Http\Interfaces\RoleRepoitoryInterface;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('dashboard.pages.roles.index');
    }


    public function create()
    {
          $permissions = Permission::get()->groupBy(function ($data){
            return trim( substr($data->name,strpos($data->name,'-')),'-');
        });

        return view('dashboard.pages.roles.container.front.create',compact('permissions'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        $role = Role::create(['name'=>$request->name]);
        $permissions = $role->syncPermissions($request->permission);
        if (!$role || !$permissions)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }

    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('dashboard.pages.roles.container.front.show',compact('role'));
    }



    public function edit($data)
    {
         $role = Role::findOrFail($data);
         $role_permissions = $role->permissions->pluck('id')->toArray();
         $permissions = Permission::get()->groupBy(function ($data){
             return trim( substr($data->name,strpos($data->name,'-')),'-');
         });;
         return view('dashboard.pages.roles.container.front.edit',compact('role','role_permissions','permissions'));
    }


    public function update($request,$id)
    {
        $role = Role::find($id);
        if(!$role)
        {
            return 'error';
        }

        DB::beginTransaction();
        $role->update(['name'=>$request->name]);
        $permissions = $role->syncPermissions($request->permission);
        if (!$role || !$permissions)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';
    }

    public function delete($item)
    {
        $item = Role::find($item);
        if(!$item)
        {
            return 'error';
        }
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete(array $data)
    {
        Role::whereIn('id',$data)->delete();
        return 'done';
    }
}
