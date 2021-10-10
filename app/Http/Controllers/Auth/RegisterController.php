<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Traits\MAIL;
use App\Model\RoleUser;
use App\Model\RegisterVerify;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use MAIL;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('getVerify','SendToken');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::begintransaction();

        try{
            $token = \Str::random(60);
            $user  = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $user_role          = new RoleUser;
            $user_role->user_id = $user->id;
            $user_role->role_id = 2;
            $user_role->save();

            $user_verify                   = new RegisterVerify;
            $user_verify->email            = $user->email;
            $user_verify->register_token   = $token;
            $user_verify->is_token_active  = 1;
            $user_verify->token_expires_at = Carbon::now()->addMinute(15)->format('Y-m-d H:i:s');
            $user_verify->save();

            $link = \URL::to('/').'/check-register-token/'.$token;
            $mail_body = view('mail.new_registration')
                ->with('user', $user)
                ->with('link', $link)
                ->render();
            $mail_response = $this->EmailVerification($mail_body,$user->email);

            if ($mail_response == 0) {
                return redirect()->back()->with('flashMessageError', 'Something went wrong !');
            }

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();

        return $user;
    }

    public function getVerify($token)
    {
        DB::begintransaction();
        try{
            $check_reg = RegisterVerify::where('register_token',$token)->first();
            $check_user = User::where('email',$check_reg->email)->first();

            if (empty($check_reg) || $check_reg->count() == 0) {
                Toastr::error('Your Register Token Mismatched!!', 'Token Mismatched', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }
            if ($check_reg->token_expires_at < date("Y-m-d H:i:s") || $check_reg->is_token_active == 0) {
                Toastr::error('Your Register Token Expired!! Please try again!', 'Token Expired', ["positionClass" => "toast-top-right"]);
                return redirect()->route('index');
            }
            if ($check_reg->token_expires_at >= date("Y-m-d H:i:s")) {
                $check_reg->is_token_active = 0;
                $check_reg->save();
                $check_user->is_verified = 1;
                $check_user->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();
        Toastr::success('Your Account Verified Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');
    }

    public function SendToken()
    {
        DB::begintransaction();

        try{
            $token                        = \Str::random(60);
            $user                         = Auth::user();
            $reg_verify                   = RegisterVerify::where('email',$user->email)->first();
            $reg_verify->register_token   = $token;
            $reg_verify->is_token_active  = 1;
            $reg_verify->token_expires_at = Carbon::now()->addMinute(15)->format('Y-m-d H:i:s');
            $reg_verify->save();

            $link = \URL::to('/').'/check-register-token/'.$token;
            $mail_body = view('mail.new_registration')
                ->with('user', $user)
                ->with('link', $link)
                ->render();
            $mail_response = $this->EmailVerification($mail_body,$user->email);

            if ($mail_response == 0) {
                return redirect()->back()->with('flashMessageError', 'Something went wrong !');
            }

        }catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();
        Toastr::success('Your Account Verified Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index');

        DB::commit();
    }

}
