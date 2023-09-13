<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\DirectorModel;
use App\Models\Scriptwriter;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        return view('admin.movies.index');
    }

    public function create()
    {
        $countries = Countries::all();
        $directors = DirectorModel::all();
        $sks = Scriptwriter::all();
        return view('admin.movies.create', compact('countries', 'sks', 'directors'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
