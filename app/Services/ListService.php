<?php

namespace App\Services;

class ListService
{
    protected $perPage = null;
    protected $searchTerm = null;
    protected $parameters = [];
    protected $relations = [];

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function setSearchTerm($searchTerm)
    {
        $this->searchTerm = $searchTerm;
        return $this;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }
}