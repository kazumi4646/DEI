<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Blog extends BaseController
{
	public function index()
	{
		$page = [
			'title' => 'Blog | Desa Ekspor Indonesia',
		];

		return view('blog/index', ['page' => $page]);
	}
}
