<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
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
     * Category model
     */
    protected $category;

    /**
     * Instantiate.
     *
     * @return void
     */
    public function __construct(Post $post, Category $category)
    {
        $this->posts = $post;
        
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_posts = $this->posts->count();

        $posts = $this->posts->orderBy('created_at', 'DESC')->paginate($this->paginate);

        $categories = $this->category->get();

        $this->setData('total_posts', $total_posts);
        $this->setData('categories', $categories);
        $this->setData('posts', $posts);

        return view('frontend.home')->with($this->data);
    }
}
