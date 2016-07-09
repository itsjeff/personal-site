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
		$data = [
			'moduleUrl' => $this->moduleUrl,
			'categories' => $this->category->get(),
			];

		return view('backend.category-form')->with($data);
    }

    /**
     * Show form.
     * @return void
     */
    public function edit(Request $request, $id)
    {
		$data = [
			'moduleUrl' => $this->moduleUrl,
			'category' => $this->category->find($id),
			'categories' => $this->category->get(),
			];

		return view('backend.category-form')->with($data);
    }

    /**
     * Store
     * @return [type] [description]
     */
    public function store(Request $request)
    {
		//
    }
}
