<?php

namespace App\Http\Controllers\Auth;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

        // Different Redirect for admin and customer

        $users = DB::table('users')->select('user_type')->where('email',request()->email)->first();
        $role  = DB::table('role_user')->select('role_id')->first();
        if (isset($role) && $role->role_id == 1) {
            $this->redirectTo = '/dashboard';
        }else{
            $this->redirectTo = '/user_dashboard';
        }
    }

    public function CheckDuplicate(Request $request)
    {
        $isExists   = User::where('email',$request->email)->first();

        if($isExists){
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }
}
