<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:12'],
        ]);


       $api_token= Str::random(10);


        $Create=User::create([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'password' => $request['password'],
            'api_token' => $api_token,

//            'api_Token' =>'api_token' = Str::random(60),
        ]);



        if ($Create)
            return "註冊成功...$api_token";


//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => $data['password'],
//            'api_token' => Str::random(60),
//        ]);

       //  User::create($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Auth::user();            // 通过 Auth facade 来访问已认证的用户：

    }


    public function update(Request $request)
    {
        $request->validate([
            'name',
            'email' => 'unique:users|email',
            'password',
        ]);


        Auth::user()->update($request->all());



        return 'User updated successfully';
    }











//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request )
//    {
//            $request->validate([
//            'name' => 'required',
//            'email' => 'required|unique:users,email,',
//            'password' => 'required',
//            ]);
//
//        Auth::user()->update($request->all());
//
//        return 'User updated successfully';
//
//    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
//     */
    public function destroy($api_token)
    {

        $user = User::where('api_token',$api_token);

        if ($user && $user->delete()){

            return 'User deleted successfully';
        }

        else{
            return '未成功刪除';
        }



//        $id->delete();
//
//        return 'User deleted successfully';
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



}
