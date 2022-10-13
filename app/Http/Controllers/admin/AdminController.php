<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $pagetitle = 'صفحه اصلی ادمین';

        return view('admin.index', compact('pagetitle'));
    }
}
