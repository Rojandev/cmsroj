<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = [
    	'title',
    	'content',
    	'excerpt',
    	'slug',
    	'category',
    	'tags',
    	'author',
    	'publish',
    ];

    protected $dates = [
    	'publish',
    	'created_at',
        'updated_at',
    ];
}
