<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\StoreRequest;
use App\Services\Interfaces\ICategoryService;
use App\Services\Interfaces\ITaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View as ViewReturn;
use Illuminate\Support\Facades\View;

class TaskController extends CustomController
{
    private $taskService;
    private $categoryService;

    public function __construct(
        ITaskService $taskService,
        ICategoryService $categoryService
    ) {
        $this->taskService      = $taskService;
        $this->categoryService  = $categoryService;
    }

    public function list_tasks(): ViewReturn
    {
        $data = [
            'categories'    => $this->categoryService->getCategories()
        ];
        return View::make('task.list')->with(parent::PARAMS, $data);
    }

    public function get(): JsonResponse
    {
        return $this->taskService->getTasksServerSide();
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $response = $this->taskService->store($request->validated());
        return $this->response($response, $response[parent::CODE]);
    }

    public function delete(DeleteRequest $request): JsonResponse
    {
        $response = $this->taskService->delete($request->validated());
        return $this->response($response, $response[parent::CODE]);
    }
}
