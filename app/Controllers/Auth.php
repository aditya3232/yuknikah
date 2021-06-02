<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    // ini cara meridirect controller auth ke login dari controller
    // return redirect()->to(site_url('login'));
  }
  public function login()
  {
    return view('auth/login');
  }
}