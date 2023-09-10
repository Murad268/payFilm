<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        $settings = Settings::first()->get();
        return view('admin.settings.index', compact('settings'));
    }
}
