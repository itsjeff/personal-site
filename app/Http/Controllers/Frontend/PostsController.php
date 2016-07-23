<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Post model
     */
    protected $post;

    /**
     * Instantiate.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
	}

	/**
	 * Display single post.
	 * 
	 * @param  string  $slug  Display post based on slug.
	 * @return void
	 */
    public function show($slug)
    {
    	$post = $this->post
    		->where('slug', $slug)
    		->first();

        $this->setData('post', $post);

        return view('frontend.post')->with($this->data);
    }
}
