<?php

namespace App\Http\Controllers;
use App\Album;

use App\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $albums = Album::with('Photos')->get();
        $photos = Photo::all();
        return view('albums.index')->with('albums', $albums)->with('photos', $photos);

        //return view('home');
    }
}
