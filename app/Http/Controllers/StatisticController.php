<?php

namespace App\Http\Controllers;

use App\Infrastructure\Contracts\StatisticRepositoryInterface;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(StatisticRepositoryInterface $statisticRepository)
    {
        $statistics = $statisticRepository->getTop(10);
        return view('statistics.index', compact('statistics'));
    }
}
