<?php

namespace App\Http\Controllers\Site\Rating;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Site\RatingRepositoryInterface;
use App\Http\Requests\Site\Rating\RatingRequest;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    private $repository;
    public function __construct(RatingRepositoryInterface $ratingRepository)
    {
        $this->repository = $ratingRepository;
    }

    public function store_rating(RatingRequest $request)
    {
        return $this->repository->store_rating($request);
    }

    public function loadMore(Request $request)
    {
        return $this->repository->loadMore($request);
    }

    public function delete(Request $request)
    {
        return $this->repository->delete($request);
    }
}
