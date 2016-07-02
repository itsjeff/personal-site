<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function posts()
    {
    	return $this->hasMany('App\Models\PostRelationship', 'category_id');
    }
}

// select `posts`.*, `post_relationships`.`category_id` 
// from `posts` 
// inner join `post_relationships` on `post_relationships`.`id` = `posts`.`post_id` 
// where `post_relationships`.`category_id` = 1 and `posts`.`deleted_at` is null
