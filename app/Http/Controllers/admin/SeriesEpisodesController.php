<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SeriesEpisodes;
use Illuminate\Http\Request;

class SeriesEpisodesController extends Controller
{
    public function index($id, $serie_id)
    {
        $episodes = SeriesEpisodes::where('serie_id', $serie_id)->where('season_id', $id)->paginate(4);
        $serie_id = $serie_id;
        $id= $id;
        return view('admin.episodes.index', compact('episodes', 'serie_id', 'id'));
    }

    public function create($id, $serie_id)
    {
        $serie_id = $serie_id;
        $id= $id;
        return view('admin.episodes.create', compact('id', 'serie_id'));
    }
}
