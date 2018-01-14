<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The post that belong to the category.
     */
    public function post()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
