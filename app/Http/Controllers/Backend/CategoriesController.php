<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class CategoriesController extends Controller
{
	/**
	 * Displays categories
	 * @return void
	 */
    public function index()
    {
    	return view('backend.category-manage');
    }
}
