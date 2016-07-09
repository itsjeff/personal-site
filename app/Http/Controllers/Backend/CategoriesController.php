<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Category;

class CategoriesController extends Controller
{
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/admin/categories';

	/**
	 * Category model
	 * @var App\Models\Category
	 */
	protected $category;

	/**
	 * Instantiate
	 * @return void
	 */
	public function __construct(Category $category)
	{
		$this->pushBreadcrumb('Categories', $this->moduleUrl);
		$this->setData('moduleUrl', $this->moduleUrl);

		$this->category = $category;
	}

	/**
	 * Displays categories
	 * @return void
	 */
    public function index()
    {
    	$this->setData('categories', $this->category->get());

    	return view('backend.category-manage')->with($this->data);
    }

    /**
     * Show form.
     * @return void
     */
    public function create()
    {
    	$this->pushBreadcrumb('Create Category');
    	$this->setData('categories', $this->category->get());

		return view('backend.category-form')->with($this->data);
    }

    /**
     * Show form.
     * @return void
     */
    public function edit(Request $request, $id)
    {
		$this->setData('category', $this->category->find($id));
		$this->setData('parents', $this->category->get());

		return view('backend.category-form')->with($this->data);
    }

    /**
     * Store
     * @return [type] [description]
     */
    public function store(Request $request)
    {
		$category = new Category;
		$category->title = $request->input('title');
		$category->slug = ($request->has('slug')) ? str_slug($request->input('slug')) : str_slug($request->input('title'));
		$category->parent_id = ($request->has('parent_id')) ? $request->input('parent_id') : 0;
		$category->order = 0;
		$category->save();

		return redirect($this->moduleUrl);
    }
}
