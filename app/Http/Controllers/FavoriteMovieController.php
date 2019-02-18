<?php

namespace App\Http\Controllers;

use App\FavoriteMovie;
use Illuminate\Http\Request;

class FavoriteMovieController extends Controller
{
    public function index()
    {

        return FavoriteMovie::all();
    }

    public function show(FavoriteMovie $FavoriteMovie)
    {
        return $FavoriteMovie;
    }

    public function store(Request $request)
    {
        $FavoriteMovie = FavoriteMovie::create($request->all());

        return response()->json($FavoriteMovie, 201);
    }

    public function update(Request $request, FavoriteMovie $FavoriteMovie)
    {
        $FavoriteMovie->update($request->all());

        return response()->json($FavoriteMovie, 200);
    }

    public function delete(FavoriteMovie $FavoriteMovie)
    {
        $FavoriteMovie->delete();

        return response()->json(['data' => 'Deleted.'], 200);
    }
}
