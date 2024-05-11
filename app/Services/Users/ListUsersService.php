<?php

namespace App\Services\Users;

use App\Enums\UserRole;
use App\Infrastructure\Contracts\UserRepositoryInterface;
use App\Services\ListService;
use Mockery\Generator\Parameter;

class ListUsersService extends ListService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
        //
    }

    public function getAll($role = UserRole::USER)
    {
        $this->parameters['role'] = $role;
        return $this->userRepository->getAll(
            perPage: $this->perPage,
            searchTerm: $this->searchTerm,
            parameters: $this->parameters
        );
    }
}