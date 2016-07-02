<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Displays dashboard
	 * @return void
	 */
    public function index()
    {
    	return view('backend.dashboard');
    }
}
