<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\User;
use Auth;
use Gate;

use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('Photos')->get();
        $photos = Photo::all();
        return view('albums.index')->with('albums', $albums)->with('photos', $photos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'required|mimes:jpeg,png,jpg,bmp|max:5048',
        ]);

        // Get filename with extension
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $image = $request->file('cover_image'); //sada

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $imageName = time().time().'.'.$image->getClientOriginalExtension(); // sada

        // Get just the extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // Create new filenameToStore
        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        // Upload image
        //$path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        $target_path = public_path('/uploads/albums_photos/'); // sada
        $image->move($target_path, $filenameToStore); // sada

        // Create album
        $album = new Album;
        $album->user_id =  Auth::user()->id;
        $album->name = $request->input('name');
        $album->cover_image = $filenameToStore;
        // $album->cover_image = $filename;;

        // $album->save();

        if($album->save()){
            $request->session()->flash('success', "Album " . $album->name . ' je uspještno kreiran');
        }else{
            $request->session()->flash('error', 'Došlo je do pogreške tokom kreiranja albuma!');
        }


        return redirect('/albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('Photos')->findOrFail($id);
        $files  =   Photo::all();

        return view('albums.show', compact('files'))->with('album', $album);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        // $album->delete();

        if($album->delete()){
            session()->flash('success', "Album " . $album->name . ' je uspješno izbrisan');
        }else{
            session()->flash('error', 'Došlo je do greške prilikom brisanja albuma - ' . $album->name . '!');
        }

        if(Gate::denies('delete-users')){
            return redirect()->route('management.show',Auth::user());
        }

        return redirect()->route('admin.users.index');
        // return redirect()->route('management.show',Auth::user());
    }
}
