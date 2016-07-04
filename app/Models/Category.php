<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function posts()
    {
    	return $this->belongsToMany('App\Models\Post', 'post_relationships');
    }
}
