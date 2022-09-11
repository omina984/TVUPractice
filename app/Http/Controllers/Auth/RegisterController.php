<?php

namespace App\Http\Controllers\Auth;

use App\Models\Marakez;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $pagetitle = 'ثبت نام کاربر جدید';
        $marakez = Marakez::all()->where('state', '<>', 0);

        return view('admin.auth.register')->with(['pagetitle' => $pagetitle, 'marakez' => $marakez]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'father' => ['required', 'string', 'max:255'],
            'nationalcode' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function create(array $data)
    {
        $type = -1;
        if ($data['type'] == 'student')
            $type = 1;
        else if ($data['type'] == 'teacher')
            $type = 2;
        else if ($data['type'] == 'admin')
            $type = 99;
        else
            $type = -1;

        $isadmin = -1;
        if ($data['type'] == 'admin')
            $isadmin = 1;
        else
            $isadmin = 0;

        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'family' => $data['family'],
            'father' => $data['father'],
            'nationalcode' => $data['nationalcode'],
            'mobile' => $data['mobile'],
            'markaz_id' => $data['markaz'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => $type,
            'isadmin' => $isadmin,
            'state' => 1,
        ]);
    }
}
