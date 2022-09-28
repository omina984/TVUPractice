<?php

namespace App\Http\Controllers\admin;

use App\Models\Marakez;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\Major;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Rules\Nationalcode;

class UserController extends Controller
{
    public function index()
    {
        $pagetitle = 'به روز رسانی مشخصات کاربر';
        $users = DB::table('users')->join('marakez', 'marakez.id', '=', 'users.markaz_id')->orderBy('users.id', 'desc')
            ->select(
                'users.id as user_id',
                'username',
                'users.name as user_name',
                'family',
                'father',
                'nationalcode',
                'mobile',
                'markaz_id',
                'email',
                'type',
                'users.state as user_state',
                'marakez.name as markaz_name'
            )->paginate(10);

        return view('admin.user.index', compact('pagetitle', 'users'));
    }

    public function search(Request $request)
    {
        $pagetitle = 'به روز رسانی مشخصات کاربر';

        $users = User::where('username', 'like', '%' . $request->username . '%')->join('marakez', 'marakez.id', '=', 'users.markaz_id')->orderBy('users.id', 'desc')
            ->select(
                'users.id as user_id',
                'username',
                'users.name as user_name',
                'family',
                'father',
                'nationalcode',
                'mobile',
                'markaz_id',
                'email',
                'type',
                'users.state as user_state',
                'marakez.name as markaz_name'
            )->paginate(10);

        return view('admin.user.index', compact('pagetitle', 'users'));
    }

    public function create()
    {
        $pagetitle = 'ایجاد کاربر جدید';
        $marakez = Marakez::all()->where('state', '<>', 0);
        $majors = Major::all()->where('state', '<>', 0);

        return view('admin.user.create', compact('pagetitle', 'marakez','majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'father' => ['required', 'string', 'max:255'],
            'nationalcode' => ['required', 'string', 'max:255', 'unique:users', new Nationalcode],
            'mobile' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $type = -1;
        if ($request->get('type') == 'student')
            $type = 2;
        else if ($request->get('type') == 'teacher')
            $type = 1;
        else if ($request->get('type') == 'admin')
            $type = 0;
        else
            $type = -1;

        $user = new User([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            'family' => $request->get('family'),
            'father' => $request->get('father'),
            'nationalcode' => $request->get('nationalcode'),
            'mobile' => $request->get('mobile'),
            'markaz_id' => $request->get('markaz'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'type' => $type,
            'major_id' => $request->get('major_id'),
            'state' => 1,
        ]);

        try {
            $user->save();

            $msg = 'ذخیره کاربر جدید با موفقیت انجام شد';

            return redirect(Route('admin.users.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.users.index'))->with('warning', $exception->getCode());
        }
    }

    public function edit(User $user)
    {
        $pagetitle = 'ویرایش کاربر موجود';
        $marakez = Marakez::all()->where('state', '>=', 0);
        $majors = Major::all()->where('state', '>=', 0);

        return view('admin.user.edit', compact('pagetitle', 'user', 'marakez','majors'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'father' => ['required', 'string', 'max:255'],
            'nationalcode' => ['required', 'string', 'max:255', new Nationalcode],
            'mobile' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        //اگر آدرس پست الکترونیک تکراری برای کاربر انتخاب شود
        $id = DB::table('users')->where('email', '=', $request->email)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $user->id) {
                $msg = 'آدرس پست الکترونیک نمی‌تواند تکراری باشد';

                return redirect(Route('admin.user.edit', $user->id))->with('warning', $msg);
            }

        try {
            $user->update($request->all());

            $msg = 'ذخیره کاربر موجود با موفقیت انجام شد';

            return redirect(Route('admin.users.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.users.index'))->with('warning', $exception->getCode());
        }
    }
}
