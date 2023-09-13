<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\movies\CreateMovieRequest;
use App\Models\Actors;
use App\Models\Categories;
use App\Models\Countries;
use App\Models\DirectorModel;
use App\Models\HomeCategories;
use App\Models\Scriptwriter;
use App\Services\MovieService;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function __construct(private MovieService $movieService)
    {

    }
    public function index()
    {
        return view('admin.movies.index');
    }

    public function create()
    {

        $categories = Categories::all();
        $homeCategories = HomeCategories::all();
        $countries = Countries::all();
        $directors = DirectorModel::all();
        $scriptwriters = Scriptwriter::all();
        $actors = Actors::all();

        return view('admin.movies.create', compact('homeCategories', 'categories', 'actors', 'countries', 'directors', 'scriptwriters', "actors" ));
    }

    public function store(CreateMovieRequest $request)
    {
        $this->movieService->create($request);
        // return redirect()->route('admin.movies.index')->with("message", "The information was added to the database");
        dd($request->all());
    }
}
