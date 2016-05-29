<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
	
	protected $table = 'posts';	

	protected $dates = ['deleted_at'];

	public function category()
	{
		return $this->belongsToMany('App\Models\Category');
	}
}
