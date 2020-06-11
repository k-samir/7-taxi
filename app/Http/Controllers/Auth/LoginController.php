<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpOption\None;
use Symfony\Component\HttpFoundation\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $urlsplit = explode('/',url()->current());
        if(count($urlsplit)==4){
            if($urlsplit[3] == "logout"){
                session()->flush();
            }elseif($urlsplit[3] == "login"){
                $role = User::firstWhere('email',$request->email);
                if(!empty($role)){
                    session(['role'=>$role->role]);
                }  
            }
        }
    }
}
