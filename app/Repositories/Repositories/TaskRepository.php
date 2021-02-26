<?php

namespace App\Repositories\Repositories;

use App\Models\CategoryTask;
use App\Models\Task;
use App\Repositories\Interfaces\ITaskRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository extends CustomRepository implements ITaskRepository
{
    private $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTasks(): Collection
    {
        return $this->task->all();
    }

    public function getTaskById(int $taskId): ?Task
    {
        return $this->task->find($taskId);
    }

    public function store(array $params): Task
    {
        return $this->task->create($params);
    }

    public function addCategoryToTask(Task $task, int $categoryId): void
    {
        $task->categories()->attach($categoryId);
    }

    public function deleteCategoryToTask(Task $task, int $categoryId): void
    {
        $task->categories()->detach($categoryId);
    }
}
