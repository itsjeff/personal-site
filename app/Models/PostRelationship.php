<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostRelationship extends Model
{
    protected $table = 'post_relationships';

    public $timestamps = false;

    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }
}
