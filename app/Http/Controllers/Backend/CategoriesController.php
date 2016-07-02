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
		$this->category = $category;
	}

	/**
	 * Displays categories
	 * @return void
	 */
    public function index()
    {
    	$this->setData('categories', $this->category->get());
    	$this->setData('moduleUrl', $this->moduleUrl);

    	return view('backend.category-manage')->with($this->data);
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
