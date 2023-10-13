<?php


namespace App\Http\Interfaces\Site;


use Illuminate\Http\Request;

interface ProjectRepositoryInterface
{
    public function projects();
    public function loadMore($request);
    public function single_project($id);

}
