<?php


namespace App\Http\Interfaces\Site;


interface RatingRepositoryInterface
{
    public function store_rating($request);

    public function loadMore($request);

    public function delete($request);
}
