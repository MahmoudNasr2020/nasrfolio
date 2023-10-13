<?php


namespace App\Http\Interfaces\Site;


interface PostRepositoryInterface
{
    public function posts();
    public function loadMore($request);
    public function single_post($id);
}
