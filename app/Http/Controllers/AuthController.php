<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view("Auth/register");
    }

    public function register(Request $request)
    {
        //catch and validate
        $data = $request->validate([
            'name' => "required|string|max:100",
            'email' => "required|email|unique:users,email",
            'password' => "required|string|min:6|confirmed",
        ]);

        $data['password'] = bcrypt($data['password']);

        //insert
        $user = User::create($data);
        Auth::login($user);
        Mail::to($user->email)->send(new WelcomeMail($user->name));
        //redirect
        // session()->flash("success", "Account created , Login to check !");
        return redirect(url("categories"));
    }

    public function loginForm()
    {
        return view("Auth.login");
    }

    public function login(Request $request)
    {
        //catch
        // $email = $request->input('email');
        // $password = $request->input('password');
        //validate
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // compare data
        if (Auth::attempt($data)) {
            return redirect()->intended("categories");
        }

        //redirect
        // session()->flash("error" , "")
        return back()->withErrors([
            'email' => 'Invalid Login',

        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url("login"));
    }

    /*************************** */
    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function sendlink(Request $request)
    {
        $email = $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $status = Password::sendResetLink(
            $request->only('email'),
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('Success', 'check your email')
            : back()->with('error', 'error occured');
        //if sent . this is the form that will return , this to how form the route
        //reset-password/{token}?email=someone@example.com

    }

    public function restpassword($token)
    {
        return view('Auth.reset-password', compact('token'));
    }

    public function passwordupdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->update([
                    'password' => Hash::make($password),
                ]);
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
