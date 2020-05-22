<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Album;
use App\Photo;
use Auth;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Image;

class ProfilesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('UserProfile.profile')->with('users', $users);

    }


    public function show($user_id)
    {

        $user = User::find($user_id);
        //$albums = Album::all();

        $albums = Album::where('user_id', '=', $user->id)->get();

        $photos = Photo::where('user_id', '=', $user->id)->get();

        return view('UserProfile.profile')->with('user', $user)->with('albums', $albums)->with('photos', $photos);         
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name'=>'required|max:255|string',
            'last_name'=>'required|string|max:255',
            'email'=>'required|string',
        ));
        
        
        $user = User::find($id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->instagram = $request->instagram;
        $user->about = $request->about;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatar/'. $filename));
        
            $user->avatar = $filename;
        }

         if($user->save()){
            $request->session()->flash('success', $user->name . ' has been updated');
        }else{
            $request->session()->flash('error', 'There was an error updating the user');
        }

        return redirect()->route('profile.show', $user)->withUser($user);
    }

    public function edit($user_id)
    {

        $user=User::find($user_id);
        return view('UserProfile.edit')->withUser($user);

    }

}
