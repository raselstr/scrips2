<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Perjadin extends BaseController
{
    public function index()
    {
        return view('perjadin/index');
    }
}
