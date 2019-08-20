<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
    redirect users after lgin
     */
    public function redirectTo()
    {
        return 'admin/';
    }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

}
