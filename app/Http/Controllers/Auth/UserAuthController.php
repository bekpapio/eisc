<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\ForgotMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserAuthController extends Controller
{

    protected $redirectTo = '/login';
    protected $redirectTos = '/';
  

    public function showLoginForm(){
      
        if (Auth::check()) {
            return redirect()->intended($this->redirectTos);
        }
    
        return view('auth.login');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    // send new generated password 
    public function sendGeneratedEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);
    $user = User::where('email', $request->email)->first();
   

    if (!$user) {
        return back()->with('error', 'Email Not Found.');
    }

    $newPassword = Str::random(10); // Generate a new random password
    $user->password = Hash::make($newPassword); // Update the user's password
    $user->save();

    // Send the new password to the user's email
    Mail::to($user->email)->send(new ForgotMail($user, $newPassword));

    return redirect()->route('login')->with('success', 'Check Your Email. The new generated password is sent');
}


// change password 
public function changePasswordForm()
{
    return view('auth.change-password');
}


// 
public function changePassword(Request $request)
{
    try {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed:confirm_password',
        ]);
        $loginUser = Auth::user();
        $user=User::findOrFail($loginUser->id);
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }
        

        $user->password = Hash::make($request->new_password);
        $user->save();


        
        Auth::logout();
        
        return redirect()->route('login')->with('success', 'Password has been changed successfully.');
   
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred while changing the password.'. $e->getMessage());
    }
}


    public function login(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTos);
        }

        // return redirect()->back()->withInput($request->only('email'))->withErrors([
        //     'email' => 'Invalid credentials.',
        // ]);
        return redirect()->back()->with('error','Invalid credentials');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended($this->redirectTo);
    }
}
