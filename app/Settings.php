<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $fillable = [
    	'site_title',
    	'tagline',
    	'email',
    	'home_page',
    	'blog_page',
    ];

    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function home()
    {
    	return $this->belongsTo('App\Page', 'home_page');
    }
}
