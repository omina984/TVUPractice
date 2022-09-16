<?php

namespace App\Http\Controllers\admin\autheitication;

use App\Models\Marakez;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class UpdateUserController extends Controller
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
                'marakez.name as markaz_name'
            )->get();

        return view('admin.auth.updateuser.index', compact('pagetitle', 'users'));
    }
}
