<?php




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Str;


class UserLoginController extends Controller
{
    public function UserLogin (Request $request)
    {
//        dd($request);
        $user = User::where('email', $request->UserEmail)->where('password', $request->UserPassword)->first();
        $apiToken = Str::random(10);
        if ($user->update(['api_token'=>$apiToken])) { //update api_token


//            if ($user->isAdmin)
            return "login as user, your api token is $apiToken";
//            else
//                return "login as user, your api token is $apiToken";
        }
    }
}


















//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//namespace App\Http\Controllers\Vendor;
//use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Http\Request;





//class UserLoginController extends Controller
//{
//    use AuthenticatesUsers;
//
//    /**
//     * 登入後導向的畫面
//     * @var string
//     */
//    protected $redirectTo = '/user';
//    /**
//     * 透過guest middleware，若登入後再回到login時會幫你自動跳轉到指定頁面(需在RedirectIfAuthenticated.php 內設定跳轉路徑)。guest後面可以帶入guard的參數，這邊使用vendor
//     */
//    public function __construct()
//    {
//        $this->middleware('guest:api', ['except' => 'logout']);
//    }
//
//
////    /**
////     * 登入頁面
////     * @return \Illuminate\Http\Response
////     */
////    public function showLoginForm()
////    {
////        return view('vendor/login');
////    }
//
//
//    /**
//     * 定義登入時須輸入的table對應欄位，這邊我們在table內輸入的是account。
//     * @return string
//     */
//    public function username()
//    {
//        return 'account';
//    }
//    /**
//     * 選擇要使用的guard
//     * @return \Illuminate\Contracts\Auth\StatefulGuard
//     */
//    protected function guard()
//    {
//        return Auth::guard('api');
//    }
//    /**
//     * 登出功能
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//        $request->session()->invalidate();
//        return redirect(route('vendor::loginForm'));
//    }
//}
