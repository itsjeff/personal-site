<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Media;
use App\Models\PostRelationship;
use Auth;
use Image;

class PostsController extends Controller
{
    /**
     * Module url slug
     * @var string
     */
    public $moduleUrl = '/admin/posts';
    
    /**
     * Models
     * @var object
     */
    protected $media;
    protected $post;

    /**
     * Instantiate models
     * @return void
     */
    public function __construct(Post $post, Media $media, Category $category)
    {
        $this->pushBreadcrumb('Posts', $this->moduleUrl);
        $this->setData('moduleUrl', $this->moduleUrl);

        $this->category = $category;
        $this->media = $media;
        $this->post = $post;
    }

    /**
     * List results
     * @return void
     */
    public function index()
    {
        $this->setData('posts', $this->post->paginate(15));
        $this->setData('activeRows', $this->post->count());
        $this->setData('trashedRows', $this->post->onlyTrashed()->count());

        return view('backend.posts-manage')->with($this->data);
    }

    /**
     * Displlay post form
     * @return void
     */
    public function create()
    {
        $this->pushBreadcrumb('Create post');
        $this->setData('categories', $this->category->get());

        return view('backend.posts-form')->with($this->data);
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
        $post->slug = str_slug($request->input('title'));
        $post->content = $request->input('content');

        if ($coverImageId > 0) {
            $post->cover_image = $coverImageId;
        }

        $post->author_id = Auth::user()->id;
        $post->save();

        // Create a post to category relationship
        $relationship = new PostRelationship;
        $relationship->post_id = $post->id;
        $relationship->category_id = 1;
        $relationship->save();

        // Redirect with success message
        $success = true;

        return redirect($this->moduleUrl.'/'.$post->id.'/edit');
    }

    /**
     * Display form to edit post
     * @param  integer $id Post id
     * @return void
     */
    public function edit($id)
    {
        $this->pushBreadcrumb('Edit post');

        $this->setData('post', $this->post->WithTrashed()->find($id));
        $this->setData('categories', $this->category->get());

        return view('backend.posts-form')->with($this->data);
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

        return redirect($this->moduleUrl.'/'.$id.'/edit');
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

            Image::make($directory.$fileName)
            ->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save();

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
