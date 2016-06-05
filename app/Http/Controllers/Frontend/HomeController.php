<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Models
     */
    protected $posts;
    protected $category;

    /**
     * Create a new controller instance.
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

        $posts = $this->posts
            ->orderBy('created_at', 'DESC')
            ->get();

        $categories = $this->category->get();

        $data = [
            'total_posts' => $total_posts,
            'posts' => $posts,
            'categories' => $categories
            ];

        return view('home')->with($data);
    }
}
