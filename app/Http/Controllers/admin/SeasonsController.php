<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Seasons;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index($id) {
        $seasons = Seasons::where('serie_id', $id)->paginate(4);
        return view('admin.seasons.index', compact('seasons'));
    }
}
