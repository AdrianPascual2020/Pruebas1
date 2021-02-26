<?php

namespace App\Traits;

trait Tags
{
    public function getTagsCategories()
    {
        $categories = $this->categories ?? collect();
        $tags = [];
        foreach ($categories as $category) {
            $tags[] = '<span class="rounded bg-blue-500 text-white py-1 px-2 text-sm">'.$category->name.'</span>';
        }
        return implode(" ", $tags);
    }
}