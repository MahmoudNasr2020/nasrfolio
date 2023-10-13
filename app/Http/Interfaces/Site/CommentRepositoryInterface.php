<?php


namespace App\Http\Interfaces\Site;


interface CommentRepositoryInterface
{
    public function store_comment($request);

    public function edit_comment($request);

    public function loadMore($request);

    public function delete($request);
}
