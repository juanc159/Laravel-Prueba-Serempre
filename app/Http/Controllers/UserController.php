<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('profile.index',array('user'=>Auth::user()));
    }

    public function store(Request $request){
        // manejando la subida del avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/users/images/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile.index', array('user' => Auth::user()) );
    }
}
