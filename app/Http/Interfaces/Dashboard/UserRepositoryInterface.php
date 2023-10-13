<?php


namespace App\Http\Interfaces\Dashboard;


interface UserRepositoryInterface
{
    public function index($datatable);
    public function delete($request);
    public function multi_delete($data);
}
