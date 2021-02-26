<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CategoryTask extends Pivot
{
    const TASK              = 'task_id';
    const CATEGORY          = 'category_id';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';

    const TABLE             = 'category_tasks';

    protected $table        = self::TABLE;
    public $incrementing    = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::TASK, self::CATEGORY
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::CREATED_AT, self::UPDATED_AT
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        self::TASK          => 'integer',
        self::CATEGORY      => 'integer'
    ];
}
