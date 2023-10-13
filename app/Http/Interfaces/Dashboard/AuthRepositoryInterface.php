<?php


namespace App\Http\Interfaces\Dashboard;


interface AuthRepositoryInterface
{
    public function login($request);
    public function logout();
    public function edit_profile($request);
}
