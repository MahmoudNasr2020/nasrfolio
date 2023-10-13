<?php


namespace App\Http\Interfaces\Dashboard;


interface RoleRepositoryInterface
{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request,$id);
    public function delete($item);
    public function multi_delete(array $data);
}
