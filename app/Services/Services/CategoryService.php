<?php

namespace App\Services\Services;

use App\Repositories\Interfaces\ICategoryRepository;
use App\Services\Interfaces\ICategoryService;
use Illuminate\Database\Eloquent\Collection;

class CategoryService extends CustomService implements ICategoryService
{
    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository   = $categoryRepository;
    }

    public function getCategories(): Collection
    {
        return $this->categoryRepository->getCategories();
    }
}