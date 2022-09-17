<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $pagetitle = 'سامانه مدیریت تمارین';

        return view('auth.login', compact('pagetitle'));
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            if (auth()->user()->type == 99) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        } else {
            $msg = 'نام کاربری یا آدرس پست الکترونیکی یا کلمه عبور اشتباه است';
            return redirect()->route('login')->with('login', $msg);
        }
    }
}
