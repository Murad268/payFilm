<?php

namespace App\Services;

use App\Models\Actors;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\Positions;

use App\Services\DataServices;
use Exception;
use Illuminate\Support\Facades\Cookie;

class AdminsService
{
    public function __construct(private DataServices $dataServices)
    {
    }

    public function hashParola($parola)
    {
        return hash('sha256', $parola);
    }

    public function create($request)
    {
        try {

            $admin = new Admin();
            $data = $request->all();
            $data['password'] = $this->hashParola($request->password);
            $this->dataServices->save($admin, $data, 'create');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function update($request, $id)
    {
        try {
            $data = $request->all();
            $admin = Admin::findOrFail($id);

            // Eğer login değiştirildiyse, cookiedeki login'i güncelle
            if ($data['login'] != $admin->login) {
                Cookie::queue(Cookie::forever('login', $data['login']));
            }

            // Eğer şifre değiştirildiyse, cookieden sil
            if ($data['password']) {
                Cookie::queue(Cookie::forget('login'));
                $data['password'] = $this->hashParola($request->password);
            } else {
                $data['password'] = $admin->password;
            }

            $this->dataServices->save($admin, $data, 'update');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function delete($id)
    {
        try {
            $position = Admin::findOrFail($id);
            $position->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
