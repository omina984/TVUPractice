<?php

namespace App\Http\Controllers\admin\autheitication;

use App\Models\Marakez;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
                'isadmin',
                'users.state as user_state',
                'marakez.name as markaz_name'
            )->get();

        return view('admin.auth.users.index', compact('pagetitle', 'users'));
    }

    public function search(Request $request)
    {
        $pagetitle = 'به روز رسانی مشخصات کاربر';

        if (is_null($request->username)) {
            $users = DB::table('users')->join('marakez', 'marakez.id', '=', 'users.markaz_id')->orderBy('users.id', 'desc')
                ->select(
                    'users.id as user_id',
                    'username',
                    'users.name as user_name',
                    'family',
                    'father',
                    'nationalcode',
                    'isadmin',
                    'users.state as user_state',
                    'marakez.name as markaz_name'
                )->get();
        } else {
            $users = DB::table('users')->join('marakez', 'marakez.id', '=', 'users.markaz_id')->orderBy('users.id', 'desc')
                ->select(
                    'users.id as user_id',
                    'username',
                    'users.name as user_name',
                    'family',
                    'father',
                    'nationalcode',
                    'isadmin',
                    'users.state as user_state',
                    'marakez.name as markaz_name'
                )->get()->where('username', '=', $request->username);
        }

        return view('admin.auth.users.index', compact('pagetitle', 'users'));
    }

    public function edit(User $user)
    {
        $pagetitle = 'ویرایش کاربر موجود';
        $marakez = Marakez::all()->where('state', '<>', 0);

        return view('admin.auth.users.edit', compact('pagetitle', 'user','marakez'));
    }

    public function update(Request $request, User $user)
    {
        dd($request);
        exit;

        $messages = [
            'name.required' => 'فیلد نام ترم را وارد کنید',
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        //اگر نام تکراری برای ترم انتخاب شود
        $id = DB::table('terms')->where('name', '=', $request->name)->get();
        if (!$id->isEmpty())
            if ($id[0]->id != $term->id) {
                $msg = 'نام ترم نمی‌تواند تکراری باشد';

                return redirect(Route('admin.term.edit', $term->id))->with('warning', $msg);
            }

        try {
            $term->update($request->all());

            $msg = 'ذخیره ترم موجود با موفقیت انجام شد';
            return redirect(Route('admin.term.index'))->with('success', $msg);
        } catch (Exception $exception) {
            return redirect(Route('admin.term.index'))->with('warning', $exception->getCode());
        }
    }
}
