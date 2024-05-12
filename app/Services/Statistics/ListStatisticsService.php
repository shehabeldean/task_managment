<?php

namespace App\Services\Statistics;

use App\Infrastructure\Contracts\StatisticRepositoryInterface;
use App\Services\ListService;

class ListStatisticsService extends ListService
{
    public function __construct(private StatisticRepositoryInterface $statisticRepository)
    {
        //
    }

    public function getTop($number = 10)
    {
       return $this->statisticRepository->getTop($number);
    }
}