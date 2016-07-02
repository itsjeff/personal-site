<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class UsersController extends Controller
{
	/**
	 * Displays users
	 * @return void
	 */
    public function index()
    {
    	return view('backend.user-manage');
    }
}
