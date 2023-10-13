<?php

namespace App\Http\Controllers\Dashboard\User;

use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $repository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
        $this->middleware('permission:عرض-مستخدم,admin',['only'=>['index']]);
        $this->middleware('permission:حذف-مستخدم,admin',['only'=>['delete','multi_delete']]);
    }
    public function index(UserDataTable $userDataTable)
    {
        return $this->repository->index($userDataTable);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete($request->data);
    }
}
