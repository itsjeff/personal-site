<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class UserGroupsController extends Controller
{
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/groups';

	/**
	 * Instantiate
	 * @return  void
	 */
	public function __construct()
	{
		$this->pushBreadcrumb('User groups', $this->moduleUrl);

		$this->setData('moduleUrl', $this->moduleUrl);
	}

	/**
	 * Displays list of available user groups.
	 * @return void
	 */
    public function index()
    {
    	return view('backend.usergroup-manage')->with($this->data);
    }
}
