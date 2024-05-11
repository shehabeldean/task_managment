<?php

namespace App\Infrastructure\Eloquent\Repositories;

use App\Infrastructure\Contracts\TaskRepositoryInterface;
use App\Infrastructure\Contracts\UserRepositoryInterface;
use App\Infrastructure\Contracts\StatisticRepositoryInterface;
use App\Infrastructure\Eloquent\Models\Statistic;

class StatisticRepository extends BaseRepository implements StatisticRepositoryInterface
{
    public function __construct(Statistic $statistic)
    {
        parent::__construct($statistic);
    }

    public function applySearch($query, $searchTerm)
    {
        //
    }

    public function applyFilter($query, $filters)
    {
        //
    }
}