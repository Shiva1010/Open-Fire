<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;







class UserLogoutController extends Controller
{




    public function UserLogout()
    {

//        $out ='User logout';
//        $user = Auth::user();
        if(Auth::user()->update(['api_token' => 'User logout']))

        return "User LogOut";
    }

}
