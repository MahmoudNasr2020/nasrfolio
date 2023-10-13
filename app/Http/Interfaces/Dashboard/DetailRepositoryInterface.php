<?php


namespace App\Http\Interfaces\Dashboard;


interface DetailRepositoryInterface
{
    public function index();
    public function update($request);
    public function setting($request);
    public function profile($request);
}
