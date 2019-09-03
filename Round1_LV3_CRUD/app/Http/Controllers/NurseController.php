<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Nurse;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

use Validator;




class NurseController extends Controller
{



    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Nurse::create($input);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }














//    public function login(Request $request)
//    {
//
////        $email = $request->get('email');
////        $password = $request->get('password');
//        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])){
//            $user = Auth::guard('nurse')->user();
//            $success['token'] = $user->createToken('test'.$user->id)->accessToken;
//            return response()->json(['success' => $success, $this->successStatus]);
//        } else {
//            return response()->json(['error' => 'error', 400]);
//        }
//
//
//
//    }

//    public function login(){
//        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
//            $user = Auth::user();
//            $success['token'] =  $user->createToken('MyApp')-> accessToken;
//            return response()->json(['success' => $success], $this-> successStatus);
//        }
//        else{
//            return response()->json(['error'=>'Unauthorised'], 401);
//        }
//    }





    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:12'],
        ]);

//            if ($validate->fails()) {
//
//                return response()->json(['error'=>$validate->errors()], 401);
//            };


        $Create=Nurse::create([
            'name' =>$request['name'],
            'email' =>$request['email'],
            'password' => $request['password'],

        ]);



        if ($Create)
            return "註冊成功...";

    }




    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
//    public function details()
//    {
//        $user = Auth::user();
//        return response()->json(['success' => $user], $this-> successStatus);
//    }










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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
