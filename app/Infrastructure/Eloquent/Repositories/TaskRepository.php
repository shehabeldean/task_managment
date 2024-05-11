<?php

namespace App\Infrastructure\Eloquent\Repositories;

use App\Infrastructure\Contracts\TaskRepositoryInterface;
use App\Infrastructure\Contracts\UserRepositoryInterface;
use App\Infrastructure\Eloquent\Models\Task;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
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