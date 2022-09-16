<?php

namespace App\Http\Controllers\admin\autheitication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UpdateUserController extends Controller
{
    public function index()
    {
        $pagetitle = 'به روز رسانی مشخصات کاربر';

        return view('admin.auth.updateuser.index', compact('pagetitle'));
    }
}
