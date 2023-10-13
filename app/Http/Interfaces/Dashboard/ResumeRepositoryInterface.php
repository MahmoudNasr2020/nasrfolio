<?php


namespace App\Http\Interfaces\Dashboard;


interface ResumeRepositoryInterface
{

    public function index($datatable);
    //public function show();
    //public function create();
    public function store($request);
    public function edit($uuid);
    public function update($request,$uuid);
    public function delete($uuid);
    public function multi_delete(array $data);
    public function status($request);
}
