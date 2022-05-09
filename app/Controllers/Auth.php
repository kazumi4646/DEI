<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }
}
