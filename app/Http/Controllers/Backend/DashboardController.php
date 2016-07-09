<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/admin';

	/**
	 * Instantiate
	 * @return  void
	 */
	public function __construct()
	{
		$this->pushBreadcrumb('Dashboard', $this->moduleUrl);
	}

	/**
	 * Displays dashboard
	 * @return void
	 */
    public function index()
    {
    	return view('backend.dashboard')->with($this->data);
    }
}
