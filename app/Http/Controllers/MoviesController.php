<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store()
    {
        Movie::create([
            'name'        => \request('name'),
            'cast'        => \request('cast'),
            'genere'      => \request('genere'),
            'description' => \request('description'),
            'image'       => \request('image'),
        ]);

        return redirect('/movies');
    }
}
