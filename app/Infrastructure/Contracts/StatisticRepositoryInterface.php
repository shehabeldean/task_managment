<?php

namespace App\Infrastructure\Contracts;

interface StatisticRepositoryInterface extends BaseRepositoryInterface
{
    public function updateOrCreateStatistic($userId);

    public function getTop($number);
}