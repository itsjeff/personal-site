<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Media;

class MediaController extends Controller
{
	/**
	 * Module url slug
	 * @var string
	 */
	public $moduleUrl = '/admin/media';

	/**
	 * Models
	 * @var object
	 */
	protected $media;

	/**
	 * Instantiate
	 * @return void
	 */
	public function __construct(Media $media)
	{
		$this->pushBreadcrumb('Media', $this->moduleUrl);
		$this->setData('moduleUrl', $this->moduleUrl);

		$this->media = $media;
	}

	/**
	 * Displays media
	 * @return void
	 */
    public function index()
    {
    	$this->setData('mediaFiles', $this->media->paginate(15));

    	return view('backend.media-manage')->with($this->data);
    }
}
