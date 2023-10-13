<?php

namespace App\Http\Controllers\Dashboard\Detail;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\DetailRepositoryInterface;
use App\Http\Requests\Dashboard\Detail\UpdateProfileRequest;
use App\Http\Requests\Dashboard\Detail\SettingRequest;
use App\Http\Requests\Dashboard\Detail\UpdateDetailRequest;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    protected $repository;
    public function __construct(DetailRepositoryInterface $detailRepository)
    {
        $this->repository = $detailRepository;
        $this->middleware('permission:تعديل-التفاصيل-الاعدادت,admin',['only'=>['index','update','setting']]);
    }
    public function index()
    {
        return $this->repository->index();
    }

    public function update(UpdateDetailRequest $request)
    {

        return $this->repository->update($request);
    }

    public function setting(SettingRequest $request)
    {

        return $this->repository->setting($request);
    }

    public function profile(UpdateProfileRequest $request)
    {

        return $this->repository->profile($request);
    }
}
