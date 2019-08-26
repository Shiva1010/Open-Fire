<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;



class AdminLogoutController extends Controller
{




    public function AdminLogout()
    {

//        $out ='User logout';
//        $user = Auth::user();
        if(Auth::user()->update(['api_token' => 'Admin logout']))

            return "Admin LogOut";
    }

}
