<?php

namespace App\Services\Tasks;

use App\Infrastructure\Contracts\TaskRepositoryInterface;

class CreateTaskService
{
    public function __construct(private TaskRepositoryInterface $taskRepository)
    {
        //
    }

    public function create($data)
    {
        return $this->taskRepository->create($data);
    }
}