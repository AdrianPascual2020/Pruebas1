<?php

namespace App\Services\Interfaces;

interface ITaskService
{
    public function getTasks();
    public function getTasksServerSide();
    public function getTaskById(int $taskId);
    public function store(array $params);
    public function delete(array $params);
}
