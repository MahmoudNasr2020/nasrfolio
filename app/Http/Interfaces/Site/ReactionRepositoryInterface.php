<?php


namespace App\Http\Interfaces\Site;


interface ReactionRepositoryInterface
{
    public function store_reaction($request);
    public function remove_reaction($request);

}
