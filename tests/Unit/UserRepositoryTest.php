<?php

namespace Tests\Unit;

use App\Infrastructure\Eloquent\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Infrastructure\Eloquent\Repositories\UserRepository;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository(new User);
    }

    public function testCanRetrieveAllUsers()
    {
        User::factory()->count(5)->create();
        $users = $this->userRepository->getAll();
        $this->assertCount(5, $users);
    }
}
