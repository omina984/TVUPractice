<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $pagetitle = 'صفحه اصلی ادمین';

        return view('admin.index', compact('pagetitle'));
    }
}
