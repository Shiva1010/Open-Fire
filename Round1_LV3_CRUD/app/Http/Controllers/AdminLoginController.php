<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Str;


class AdminLoginController extends Controller
{
    public function AdminLogin (Request $request)
    {
//        dd($request);
        $user = Admin::where('email', $request->AdminEmail)->where('password', $request->AdminPassword)->first();
        $apiToken = Str::random(10);
        if ($user->update(['api_token'=>$apiToken])) { //update api_token



//            if ($user->isAdmin)
                return "login as admin, your api token is $apiToken";
//            else
//                return "login as user, your api token is $apiToken";
        }
    }
}
