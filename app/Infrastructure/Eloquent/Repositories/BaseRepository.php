<?php

namespace App\Infrastructure\Eloquent\Repositories;

use App\Infrastructure\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
        //
    }

    public function getAll($columns = ['*'], $relations = [], $perPage = null, $searchTerm = null, $parameters = [])
    {
        $query = $this->model->select($columns)->with($relations);
        $query = $this->applySearch($query, $searchTerm);
        $query = $this->applyFilter($query, $parameters);
        return $this->getOrPaginate($query, $perPage);
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    protected function getOrPaginate(Builder $query, $perPage)
    {
        if ($perPage)
            return $query->paginate($perPage);
        else
            return $query->get();
    }

    protected function applySearch($query, $searchTerm)
    {
        return $query;
    }
    protected function applyFilter($query, $filters)
    {
        return $query;
    }
}