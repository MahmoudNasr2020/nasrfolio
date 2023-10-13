<?php


namespace App\Http\Interfaces\Site;


interface AuthRepositoryInterface
{
    public function register($request);
    public function login($request);
    public function logout();
    public function edit_profile($request);
}
