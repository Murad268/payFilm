<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\movies\CreateMovieRequest;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\DirectorModel;
use App\Models\HomeCategories;
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

        $categories = Categories::all();
        $homeCategories = HomeCategories::all();

        return view('admin.movies.create', compact( 'homeCategories', 'categories'));
    }

    public function store(CreateMovieRequest $request)
    {
        dd($request->all());
    }
}
