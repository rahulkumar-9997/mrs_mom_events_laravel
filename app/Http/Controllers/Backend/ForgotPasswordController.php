<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon; 
use DB;
use App\Mail\ResetPasswordMail; 
use Illuminate\Support\Facades\Log;


class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('backend.auth.forget-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
  
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
        try {
            $data = [
                'token' => $token,
            ];
            Mail::to($request->email)
                ->send(new ResetPasswordMail($data));
            Log::info('Email sent successfully to '.$request->email.'');
        } 
        catch(Exception $e){
            Log::error('Error sending email: ' . $e->getMessage());
        }
        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) { 
        return view('backend.auth.forget-password-link', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
  
        $updatePassword = DB::table('password_resets')
                        ->where([
                        'email' => $request->email, 
                        'token' => $request->token
                        ])
                        ->first();
                            
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
  
        $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
 
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect('/login')->with('success', 'Your password has been changed!');
      }
}
