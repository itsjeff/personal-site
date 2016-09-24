<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Paginate
     * @param integer  $paginate  Set records per page
     */
    public $paginate = 15;

    /**
     * Category model
     */
    protected $category;

    /**
     * Instantiate.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
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
        $selectedCategory = $this->category->select('id')->where('slug', $slug)->first();

    	$category = $this->category->find($selectedCategory->id);

        $posts = $category
            ->posts()
            ->orderBy('created_at', 'DESC')
            ->paginate($this->paginate);
    	
        $this->setData('category', $category);
        $this->setData('posts', $posts);

        return view('frontend.category')->with($this->data);
    }
}
