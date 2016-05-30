<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
	protected $posts;
	public $moduleUrl = '/admin/posts';

	public function __construct(Post $posts)
	{
		$this->posts = $posts;
	}

	public function index()
	{
		$data = [
			'posts' => $this->posts->withTrashed()->paginate(15),
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-manage')->with($data);
	}

	public function create()
	{
		$data = [
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-form')->with($data);
	}

	public function store(Request $request)
	{
		$post = new Post;
                $post->title = $request->input('title');
                $post->content = $request->input('content');
                $post->author = Auth::user()->id;
                $post->save();

                return redirect()->back();
	}

	public function edit($id)
	{
		$data = [
			'post' => $this->posts->find($id),
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-form')->with($data);
	}

	public function update($id)
	{
		//
	}

	public function show($id)
	{
		//
	}
}
