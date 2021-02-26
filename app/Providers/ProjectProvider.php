<?php

namespace App\Providers;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Repositories\Interfaces\ITaskRepository;
use App\Repositories\Repositories\CategoryRepository;
use App\Repositories\Repositories\TaskRepository;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\ITaskService;
use App\Services\Services\CategoryService;
use App\Services\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class ProjectProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        /* Application Services */
        ITaskService::class         => TaskService::class,
        ICategoryService::class     => CategoryService::class,
        /* Application Repositories */
        ITaskRepository::class      => TaskRepository::class,
        ICategoryRepository::class  => CategoryRepository::class
    ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
