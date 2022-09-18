<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        $pagetitle = 'به روزرسانی کلمه عبور';

        return view('auth.resetpassword', compact('pagetitle'));
    }

    public function resetpassword(Request $request)
    {
        $messages = [
            'username.required' => 'فیلد نام کاربری را وارد کنید',
            'password.required' => 'فیلد کلمه عبور را وارد کنید',
            'nationalcode.required' => 'فیلد کد ملی را وارد کنید',
            'mobile.required' => 'فیلد تلفن همراه را وارد کنید',
            'email.required' => 'فیلد آدرس پست الکترونیکی را وارد کنید',
        ];

        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nationalcode' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ], $messages);

        $user = User::select('*')
            ->where([
                ['username', '=', $request->username],
                ['nationalcode', '=', $request->nationalcode],
                ['mobile', '=', $request->mobile],
                ['email', '=', $request->email],
            ])->get();

        $input = $request->all();
        $input['password'] = Hash::make($request['password']);
        if (count($user) == 0) {
            $msg = 'کاربری وارد شده در سامانه وجود ندارد. لطفا با کاربر مرکز خود در تماس باشید';

            return redirect()->route('auth.resetpassword.resetpass')->with('warning', $msg);
        } else {
            User::find($user[0]->id)->update($input);

            $msg = 'کلمه عبور با موفقیت در سامانه میز خدمت تغییر یافت';
            return redirect()->route('login')->with('success', $msg);
        }
    }
}
