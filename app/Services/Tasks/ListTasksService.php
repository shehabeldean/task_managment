<?php

namespace App\Services\Tasks;

use App\Infrastructure\Contracts\TaskRepositoryInterface;
use App\Services\ListService;

class ListTasksService extends ListService
{
    public function __construct(protected TaskRepositoryInterface $taskRepository)
    {
        $this->relations = [
            'assignedBy',
            'assignedBy',
        ];
    }
    public function getAll()
    {
        return $this->taskRepository->getAll(
            relations: $this->relations,
            perPage: $this->perPage
        );
    }
}