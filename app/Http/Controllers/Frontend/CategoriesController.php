<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function index()
    {
        echo 'list';
    }

    public function show($slug)
    {
        echo $slug;
    }
}
