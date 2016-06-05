<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Models
     */
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->posts = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts
            ->orderBy('created_at', 'DESC')
            ->get();

        $data = [
            'posts' => $posts
            ];

        return view('home')->with($data);
    }
}
