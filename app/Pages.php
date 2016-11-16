<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $fillable = [
    	'title',
    	'content',
    	'slug',
    	'type',
    	'author',
    	'publish',
    ];

    protected $dates = [
    	'publish',
    	'created_at',
        'updated_at',
    ];

    public function type()
    {
        return $this->hasOne('App\Settings');
    }
}
