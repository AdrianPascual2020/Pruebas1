<?php

use App\Models\CategoryTask;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CategoryTask::TABLE, function (Blueprint $table) {
            $table->foreignId(CategoryTask::TASK)->constrained()->cascadeOnUpdate();
            $table->foreignId(CategoryTask::CATEGORY)->constrained()->cascadeOnUpdate();
            $table->timestamps();

            $table->unique([CategoryTask::TASK, CategoryTask::CATEGORY]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CategoryTask::TABLE);
    }
}
