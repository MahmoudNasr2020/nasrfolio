<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Dashboard\AuthRepositoryInterface;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $repository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->repository = $authRepository;
    }


    public function login(LoginRequest $request)
    {
        return $this->repository->login($request);
    }

    public function edit_profile(Request $request)
    {
        return $this->repository->edit_profile($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
