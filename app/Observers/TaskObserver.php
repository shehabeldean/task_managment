<?php

namespace App\Observers;

use App\Jobs\UpdateStatistics;
use App\Infrastructure\Eloquent\Models\Task;
use App\Infrastructure\Contracts\StatisticRepositoryInterface;


class TaskObserver
{
    public function __construct(private StatisticRepositoryInterface $statisticRepository)
    {
        //
    }
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        UpdateStatistics::dispatch($task->assigned_to_id, $this->statisticRepository);
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
