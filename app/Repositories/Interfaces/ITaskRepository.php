<?php

namespace App\Repositories\Interfaces;

use App\Models\Task;

interface ITaskRepository
{
    public function getTasks();
    public function getTaskById(int $taskId);
    public function store(array $params);
    public function addCategoryToTask(Task $task, int $categoryId);
    public function deleteCategoryToTask(Task $task, int $categoryId);
}
