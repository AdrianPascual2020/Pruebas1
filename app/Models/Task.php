<?php

namespace App\Models;

use App\Traits\ButtonsActions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Tags;

class Task extends Model
{
    use HasFactory, Tags, ButtonsActions;
    
    const ID                    = 'id';
    const NAME                  = 'name';
    const CREATED_AT            = 'created_at';
    const UPDATED_AT            = 'updated_at';
    const TABLE                 = 'tasks';

    protected $table = self::TABLE;
    protected $primaryKey = self::ID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        self::NAME
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        self::ID, self::CREATED_AT, self::UPDATED_AT
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class, CategoryTask::TABLE)
        ->using(CategoryTask::class)
        ->withTimestamps();
    }
}
