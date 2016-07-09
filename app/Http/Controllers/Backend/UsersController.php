<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class UsersController extends Controller
{
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/admin/users';

	/**
	 * User model
	 * @var collection
	 */
	protected $user;

	/**
	 * Instantiate
	 */
	public function __construct(User $user)
	{
		$this->pushBreadcrumb('Users', $this->moduleUrl);
		$this->setData('moduleUrl', $this->moduleUrl);

		$this->user = $user;
	}

	/**
	 * Displays users
	 * @return void
	 */
    public function index()
    {
    	$users = $this->user->paginate(15);

    	$this->setData('users', $users);

    	return view('backend.user-manage')->with($this->data);
    }

    /**
     * Show form to create a user.
     * @return void
     */
    public function create()
    {
    	$this->pushBreadcrumb('Create user', '/create');

    	return view('backend.user-form')->with($this->data);
    }

    /**
     * Show form to edit a user.
     * @return void
     */
    public function edit($id)
    {
    	$this->pushBreadcrumb('Edit user', '/create');

    	return view('backend.user-form')->with($this->data);
    }
}
