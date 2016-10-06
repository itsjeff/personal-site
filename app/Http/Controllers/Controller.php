<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $data = [
	'title' => '',
    	];

    public function setData($tag, $data)
    {
    	$this->data[$tag] = $data;
    }

    public function pushBreadcrumb($name, $url = '')
    {
    	$this->data['breadcrumbs'][] = [
			'name' => $name,
			'url'  => $url,
    		];
    }
}
