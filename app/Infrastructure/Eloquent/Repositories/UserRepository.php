<?php

namespace App\Infrastructure\Eloquent\Repositories;

use App\Infrastructure\Contracts\UserRepositoryInterface;
use Illuminate\Foundation\Auth\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function applySearch($query, $searchTerm)
    {
        return $query->where('name', 'like', "%$searchTerm%");
    }

    public function applyFilter($query, $filters)
    {
        foreach ($filters as $key => $value) {
            $query->where($key, $value);
        }
        return $query;
    }
}