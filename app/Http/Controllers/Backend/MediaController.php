<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

class MediaController extends Controller
{
	/**
	 * Displays media
	 * @return void
	 */
    public function index()
    {
    	return view('backend.media-manage');
    }
}
