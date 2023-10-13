<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\AuthRepositoryInterface;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Http\Requests\Site\Profile\UpdateProfileRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $repository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->repository = $authRepository;
    }
    public function register(RegisterRequest $request)
    {
        return $this->repository->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->repository->login($request);
    }

    public function edit_profile(UpdateProfileRequest $request)
    {
        return $this->repository->edit_profile($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
