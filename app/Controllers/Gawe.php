<?php

namespace App\Controllers;
// biasanya controller akan mengatur view-view didalam folder yang memiliki nama yang sama dengan controllernya 
class Gawe extends BaseController
{
    public function index()
    {
        return view('gawe/get');
    }
}
