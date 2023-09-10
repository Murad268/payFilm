<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function access_check(AdminRequest $request)
    {

        function hashParola($parola)
        {
            return hash('sha256', $parola);
        }

        $login = $request->input('login');
        $password = $request->input('password');

        $hashedPassword = hashParola($password);
        $admin = Admin::where('login', $login)->where('password', $hashedPassword)->first();

        if ($admin) {
            Cookie::queue(Cookie::make('login', $login, 30));
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('admin.login')->with('message', 'login və ya şifrə yanlışdır');
        }
    }


    public function logout()
    {
        Cookie::queue(Cookie::make('login', "", -1));
        return redirect()->route('admin.login');
    }
}
