<?php

namespace App\Services\Services;

use App\Exceptions\CustomException;
use App\Models\Task;
use App\Repositories\Interfaces\ITaskRepository;
use App\Services\Interfaces\ITaskService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use Throwable;

class TaskService extends CustomService implements ITaskService
{
    private $taskRepository;

    public function __construct(ITaskRepository $taskRepository)
    {
        $this->taskRepository   = $taskRepository;
    }

    public function getTasks(): Collection
    {
        return $this->taskRepository->getTasks();
    }

    public function getTasksServerSide(): JsonResponse
    {
        return Datatables::of($this->getTasks())
            ->addColumn('action', fn (Task $task) => $task->getActions('tasks'))
            ->addColumn('categories', fn (Task $task) => $task->getTagsCategories())
            ->toJson();
    }

    public function getTaskById(int $taskId): ?Task
    {
        return $this->taskRepository->getTaskById($taskId);
    }

    public function store(array $params): array
    {
        try {
            $categories = [];

            /**
             * He puesto como opcional el poder añadir categorias
             * a la tarea
             */
            if (array_key_exists('category', $params)) {
                $categories = $params['category'];
                Arr::forget($params, 'category');
            }

            DB::beginTransaction();
            $task = $this->taskRepository->store($params);
            if ($task) {
                foreach ($categories as $category) {
                    $this->addCategoryToTask($task, $category);
                }
            }
            DB::commit();

            $response = $this->responseOK(trans('task.success.store'));
        } catch (Throwable $ex) {
            $response = $this->responseKO($ex, trans('task.errors.store'));
        }

        return $response;
    }

    public function delete(array $params): array
    {
        try {
            $task = $this->getTaskById($params[Task::ID]);
            throw_if(!$task, CustomException::class, trans('task.errors.notfound'), Response::HTTP_BAD_REQUEST);

            DB::beginTransaction();
            if ($task->categories->count()) {
                foreach ($task->categories as $category) {
                    $this->deleteCategoryToTask($task, $category->id);
                }
            }

            $task->delete();
            DB::commit();

            $response = $this->responseOK(trans('task.success.delete'));
        } catch (Throwable $ex) {
            $response = $this->responseKO($ex, trans('task.errors.delete'));
        }

        return $response;
    }

    private function addCategoryToTask(Task $task, int $categoryId): void
    {
        $this->taskRepository->addCategoryToTask($task, $categoryId);
    }

    private function deleteCategoryToTask(Task $task, int $categoryId): void
    {
        $this->taskRepository->deleteCategoryToTask($task, $categoryId);
    }
}
