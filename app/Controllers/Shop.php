<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Shop extends BaseController
{
    public function index()
    {
        return view('shop/index');
    }

    public function detail()
    {
        return view('shop/detail');
    }
}
