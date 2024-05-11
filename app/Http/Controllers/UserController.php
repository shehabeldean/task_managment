<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Services\Users\ListUsersService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchAdmins(Request $request, ListUsersService $listUsersService)
    {
        $searchTerm = $request->get('searchTerm');
        $admins = $listUsersService->setPerPage(10)->setSearchTerm($searchTerm)->getAll(UserRole::ADMIN);
        return response()->json($admins);
    }

    public function searchUsers(Request $request, ListUsersService $listUsersService)
    {
        $searchTerm = $request->get('searchTerm');
        $users = $listUsersService->setPerPage(10)->setSearchTerm($searchTerm)->getAll(UserRole::USER);
        return response()->json($users);
    }
}
