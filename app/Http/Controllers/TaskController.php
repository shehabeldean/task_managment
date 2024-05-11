<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Services\Tasks\ListTasksService;
use App\Services\Users\ListUsersService;
use Illuminate\Http\Request;
use App\Infrastructure\Eloquent\Models\User;
use App\Infrastructure\Eloquent\Repositories\TaskRepository;

class TaskController extends Controller
{
    public function index(ListTasksService $listTasksService)
    {
        $tasks = $listTasksService->setPerPage(10)->getAll();
        return view('tasks.index', compact('tasks'));
    }

    public function create(ListUsersService $listUsersService)
    {
        $admins = $listUsersService->getAll(UserRole::ADMIN);
        $users = $listUsersService->getAll();
        return view('tasks.create', compact('admins', 'users'));
    }
}
