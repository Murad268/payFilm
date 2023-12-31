<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admins\AdminsRequest;
use App\Http\Requests\admins\AdminsRequestUpdate;
use App\Models\Admin;
use App\Services\AdminsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminProccessController extends Controller
{
    public function __construct(private AdminsService $adminsService)
    {
    }
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


    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminsRequest $request)
    {
        $findAdmin = Admin::where('login', $request->login)->first();
        if ($findAdmin) {
            return redirect()->back()->with('message', 'Belə bir login ilə admin artıq mövcuddur');
        }
        $this->adminsService->create($request);
        return redirect()->route('admin.admins.index')->with("message", "the admin was added to the database");
    }



    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.edit', compact('admin'));
    }



    
    public function update(AdminsRequestUpdate $request, $id)
    {
        $findAdmin = Admin::findOrFail($id);
        if ($findAdmin) {
            if ($findAdmin->login != $request->login) {
                $existingAdmin = Admin::where('login', $request->login)->where('id', '!=', $id)->first();
                if ($existingAdmin) {
                    return redirect()->back()->with('message', 'Belə bir login ilə admin artıq mövcuddur');
                }
            }
        }
        $this->adminsService->update($request, $id);
        return redirect()->route('admin.admins.index')->with("message", "the information has been updated to the database");
    }
}
