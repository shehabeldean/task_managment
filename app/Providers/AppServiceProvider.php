<?php

namespace App\Providers;

use App\Observers\TaskObserver;
use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Eloquent\Models\Task;
use App\Infrastructure\Contracts\TaskRepositoryInterface;
use App\Infrastructure\Contracts\UserRepositoryInterface;
use App\Infrastructure\Eloquent\Repositories\TaskRepository;
use App\Infrastructure\Eloquent\Repositories\UserRepository;
use App\Infrastructure\Contracts\StatisticRepositoryInterface;
use App\Infrastructure\Eloquent\Repositories\StatisticRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(StatisticRepositoryInterface::class, StatisticRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Task::observe(TaskObserver::class);
    }
}
