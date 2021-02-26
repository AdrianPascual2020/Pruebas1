<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    const ID                    = 'id';
    const NAME                  = 'name';
    const CREATED_AT            = 'created_at';
    const UPDATED_AT            = 'updated_at';
    const TABLE                 = 'categories';

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
}
