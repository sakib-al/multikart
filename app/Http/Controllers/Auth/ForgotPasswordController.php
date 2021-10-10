<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Traits\MAIL;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    use MAIL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function ForgotPass()
    {
        return view('auth.passwords.forget_pass');
    }

    public function ResetPass(Request $request)
    {
        DB::begintransaction();
        try{
            $code = \Str::random(60);
            $check = User::where('email',$request->email)->first();

            if (empty($check) || $check->count() == 0) {
                return redirect()->back();
            }
            if ($check->user_status == 0) {
                return redirect()->back();
            }
           $check->password_token = $code;
           $check->is_token_active = 1;
           $check->	token_expires_at = Carbon::now()->addMinute(15)->format('Y-m-d H:i:s');
           $check->save();

           $link = \URL::to('/').'/reset-password/'.$code;
           $mail_body = view('mail.password_reset_mail')
                ->with('user', $check)
                ->with('link', $link)
                ->render();
            $mail_response = $this->resetPasswordEmail($mail_body,$check->email);

            if ($mail_response == 0) {
                return redirect()->back()->with('flashMessageError', 'Something went wrong !');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();
        return redirect()->back()->with('flashMessageSuccess', 'Please check your email !');
    }

    public function getResetPass($token)
    {
        DB::begintransaction();
        try{
            $check = User::where('password_token',$token)->first();

            if (empty($check) || $check->count() == 0) {
                return redirect()->back()->with('flashMessageError', 'Token mismatched !');
            }
            if ($check->token_expires_at < date("Y-m-d H:i:s") || $check->is_token_active == 0) {
                return redirect()->route('forgot.password')->with('flashMessageError', 'Token expired ! Please send another request');
            }
            if ($check->token_expires_at >= date("Y-m-d H:i:s")) {
                return view('auth.passwords.reset_pass',compact('token'));
            }
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();
    }

    public function ResetNewPass(Request $request)
    {
        DB::begintransaction();
        try{
            $check = User::where('password_token',$request->token)->first();
            if (empty($check) || $check->count() == 0) {
                return redirect()->back()->with('flashMessageError', 'Token mismatched !');
            }
            if ($check->token_expires_at < date("Y-m-d H:i:s") || $check->is_token_active == 0) {
                return redirect()->route('forgot.password')->with('flashMessageError', 'Token expired ! Please send another request');
            }
            if ($check->token_expires_at >= date("Y-m-d H:i:s")) {
                $check->password = bcrypt($request->password);
                $check->is_token_active = 0;
                $check->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Something went wrong!', 'Try again!', ["positionClass" => "toast-top-right"]);
            return redirect()->route('login')->with('flashMessageError', 'Please try again !');
        }

        DB::Commit();
        Toastr::success('Password Change Successfully', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('login');

    }

}
