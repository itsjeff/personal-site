<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    /**
     * Paginate
     * @param integer  $paginate  Set records per page
     */
    public $paginate = 15;
    
    /**
     * Post model
     */
    protected $posts;

    /**
     * Instantiate.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->posts = $post;
    }

    /**
     * Display list of categories to choose from.
     * 
     * @return void
     */
    public function index()
    {
        echo 'list';
    }

    /**
     * Show posts from chosen category.
     * 
     * @param  string  $slug  The url friendly key name to reference posts from.
     * @return void
     */
    public function show($slug)
    {
    	$posts = $this->posts->orderBy('created_at', 'DESC')->paginate($this->paginate);
    	
        $this->setData('posts', $posts);

        return view('frontend.category')->with($this->data);
    }
}
