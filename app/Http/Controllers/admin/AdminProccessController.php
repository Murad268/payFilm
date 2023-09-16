<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminProccessController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::paginate(10);
        $allCookies = $request->cookies->all();
        if (isset($allCookies['login'])) {
            $loginCookieValue = $allCookies['login'];
            $admin = Admin::where('login', $loginCookieValue)->first();
            return view('admin.admins.index', compact('admins', 'admin'));
        } else {
            dd('Login cookie not found');
        }
    }
}
