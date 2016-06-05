<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
	/**
	 * Models
	 * @var object
	 */
	protected $media;
	protected $post;
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/admin/posts';

	/**
	 * Instantiate models
	 * @return void
	 */
	public function __construct(Post $post, Media $media)
	{
		$this->media = $media;
		$this->post = $post;
	}

	/**
	 * List results
	 * @return void
	 */
	public function index()
	{
		$data = [
			'posts' => $this->post->withTrashed()->paginate(15),
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-manage')->with($data);
	}

	/**
	 * Displlay post form
	 * @return void
	 */
	public function create()
	{
		$data = [
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-form')->with($data);
	}

	/**
	 * Store new post
	 * @return void
	 */
	public function store(Request $request)
	{
		$coverImageId = $this->upload($request);

		$post = new Post;
                $post->title = $request->input('title');
                $post->content = $request->input('content');

                if ($coverImageId > 0) {
                	$post->cover_image = $coverImageId;
                }

                $post->author_id = Auth::user()->id;
                $post->save();

                return redirect()->back();
	}

	/**
	 * Display form to edit post
	 * @param  integer $id Post id
	 * @return void
	 */
	public function edit($id)
	{
		$data = [
			'post' => $this->post->WithTrashed()->find($id),
			'moduleUrl' => $this->moduleUrl,
			];

		return view('backend.posts-form')->with($data);
	}

	/**
	 * Update post
	 * @param  integer $id Post id
	 * @return void
	 */
	public function update($id, Request $request)
	{
		$coverImageId = $this->upload($request);

		$post = $this->post->find($id);
                $post->title = $request->input('title');
                $post->content = $request->input('content');

                if ($coverImageId > 0) {
                	$post->cover_image = $coverImageId;
                }

                $post->save();

        return redirect()->back();
	}

	/**
	 * Display post
	 * @param  integer $id Post id
	 * @return void
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Upload file
	 * @return void
	 */
	public function upload($request)
	{
		$directory = 'media/';
		$inputName = 'coverimage';
		$file      = $request->file($inputName);

		if ($request->hasFile($inputName)) {
			$oldFileName = $file->getClientOriginalName();
			$fileType    = $file->getClientOriginalExtension();
			$fileName    = str_slug($file->getClientOriginalName()).'.'.$fileType;

			$file->move($directory, $fileName);

			$media = new Media;
			$media->filename          = $fileName;
			$media->original_filename = $oldFileName;
			$media->path              = $directory.$fileName;
			$media->size              = $file->getClientSize();
			$media->mime_type         = $file->getClientMimeType();
			$media->save();

			return $media->id;
		}

		return 0;
	}
}
