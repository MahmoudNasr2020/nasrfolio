<?php


namespace App\Http\Interfaces\Dashboard;


interface ProjectRepositoryInterface
{
    public function index($datatable);
    public function show($id);
    public function create();
    public function store($request);
    public function edit($uuid);
    public function update($request,$uuid);
    public function delete($uuid);
    public function multi_delete(array $data);
    public function status($request);
    public function multi_images($request);
    public function upload_multi_images($request);
    public function delete_image($request);
    public function video($request);
    public function upload_video($request);
    public function delete_video($request);
}
