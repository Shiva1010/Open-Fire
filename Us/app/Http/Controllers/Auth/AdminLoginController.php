<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function  __construct()
    {
        $this->middleware('guest:admin');
    }

    public  function  showLoginForm()
    {
        return view ('auth.admin-login');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function login(array $data)
    {
        // Validate the form data


        /*
            $this-> validate($request, [
            'email' => 'required | email',
            'password' => 'requied | min:6'

        ]);
        */

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // If successful, then redirect to intended location
            return redirect()->intended(route('admin.dashboard'));

        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->
    }
}
