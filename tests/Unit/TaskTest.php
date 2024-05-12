<?php

namespace Tests\Unit;

use App\Services\Tasks\CreateTaskService;
use Mockery;
use PHPUnit\Framework\TestCase;
use App\Services\Tasks\ListTasksService;
use App\Infrastructure\Eloquent\Models\Task;
use App\Infrastructure\Eloquent\Repositories\TaskRepository;

class TaskTest extends TestCase
{
    protected $taskRepository;
    protected $taskService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->taskRepository = Mockery::mock(TaskRepository::class);
    }

    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testListTasks()
    {
        $taskService = new ListTasksService($this->taskRepository);

        $taskData1 = ['title' => 'task-1', 'description' => 'Complete this unit test.'];
        $taskData2 = ['title' => 'task-2', 'description' => 'Complete this unit test.'];

        $task1 = new Task($taskData1);
        $task2 = new Task($taskData2);

        $this->taskRepository
            ->shouldReceive('getAll')
            ->once()
            ->andReturn(collect([$task1, $task2]));

        $tasks = $taskService->getAll();

        $this->assertCount(2, $tasks);
        $this->assertEquals('task-1', $tasks[0]->title);
        $this->assertEquals('task-2', $tasks[1]->title);
    }

    public function testCreateTask()
    {
        $taskService = new CreateTaskService($this->taskRepository);

        $taskData = [
            'title' => 'New Task',
            'description' => 'Complete this unit test.',
            'assigned_by_id' => 1,
            'assigned_to_id' => 2,
        ];

        $this->taskRepository
            ->shouldReceive('create')
            ->with($taskData)
            ->once()
            ->andReturn(new Task($taskData));

        $task = $taskService->create($taskData);

        $this->assertEquals('New Task', $task->title);
        $this->assertEquals('Complete this unit test.', $task->description);
        $this->assertEquals(1, $task->assigned_by_id);
        $this->assertEquals(2, $task->assigned_to_id);
    }
}
