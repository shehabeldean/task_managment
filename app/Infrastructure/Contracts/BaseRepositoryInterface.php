<?php

namespace App\Infrastructure\Contracts;

interface BaseRepositoryInterface
{
    public function getAll($columns = ['*'], $relations = [], $perPage = null, $searchTerm = null, $parameters = []);
    public function create($data);
}