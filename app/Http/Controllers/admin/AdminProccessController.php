<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProccessController extends Controller
{
    public function index() {
        $admins = Admin::paginate(10);
        return view('admin.admins.index', compact('admins'));
    }
}
