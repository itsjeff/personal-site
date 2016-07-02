<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
	/**
	 * Display single post
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
    public function show($slug)
    {
    	echo $slug;
    }
}
