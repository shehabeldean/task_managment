<?php

namespace App\Infrastructure\Eloquent\Repositories;

use Illuminate\Support\Facades\DB;
use App\Infrastructure\Eloquent\Models\Statistic;
use App\Infrastructure\Contracts\TaskRepositoryInterface;
use App\Infrastructure\Contracts\UserRepositoryInterface;
use App\Infrastructure\Contracts\StatisticRepositoryInterface;

class StatisticRepository extends BaseRepository implements StatisticRepositoryInterface
{
    public function __construct(Statistic $statistic)
    {
        parent::__construct($statistic);
    }

    public function updateOrCreateStatistic($userId)
    {
        Statistic::updateOrCreate(
            ['user_id' => $userId],
            ['tasks_count' => DB::raw('tasks_count + 1')]
        );
    }

    public function getTop($number)
    {
        return Statistic::orderBy('tasks_count')->with('user')->take($number)->get();
    }
}