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
		$this->user = $user;
	}

	/**
	 * Displays users
	 * @return void
	 */
    public function index()
    {
    	$users = $this->user->paginate(15);

    	$this->setData('moduleUrl', $this->moduleUrl);
    	$this->setData('users', $users);

    	return view('backend.user-manage')->with($this->data);
    }
}
