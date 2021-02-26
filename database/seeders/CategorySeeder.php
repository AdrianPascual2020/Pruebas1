<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                Category::NAME  => 'PHP'
            ],
            [
                Category::NAME  => 'JavaScript'
            ],
            [
                Category::NAME  => 'CSS'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
