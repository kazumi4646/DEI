<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Shop extends BaseController
{
	public function index()
	{
		$page = [
			'title' => 'Shop | Desa Ekspor Indonesia',
			'section' => 'Shop',
			'products' => $this->productModel->where('request', 'Approved')->where('shop', 'Showed')->findAll(),
		];

		return view('shop/index', ['page' => $page]);
	}

	public function detail($id)
	{
		$page = [
			'title' => 'Product Detail | Desa Ekspor Indonesia',
			'section' => 'Product Detail',
			'product' => $this->productModel->find($id),
		];

		return view('shop/detail', ['page' => $page]);
	}
}
