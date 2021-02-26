<?php

namespace App\Repositories\Repositories;

use App\Models\Category;
use App\Repositories\Interfaces\ICategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends CustomRepository implements ICategoryRepository
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories(): Collection
    {
        return $this->category->all();
    }
}