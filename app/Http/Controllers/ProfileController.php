<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Biodata;
use App\Jurusan;
use File;

class ProfileController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function show(User $user)
    {
    	return view('profile.show', [
    		'user' => $user ,
    	]);
    }

    public function edit(Request $request)
    {
    	$user = $request->user();
    	return view('profile.edit', [
    		'user' => $user ,
    		'jurusans' => Jurusan::all(),
    	]);
    }

    public function updateProfile(Request $request)
    {
    	$user = User::find($request->user()->id);
    	$request->validate([
    		'name' => 'required|string|max:50' ,
    		'fullname' => 'required|string|max:255' ,
    		'jurusan' => 'required|numeric'
    	]);

    	if ($request->hasFile('image')) {
    		$request->validate([
    			'image' => 'image|mimes:jpg|max:2048'
    		]);

    		File::delete(public_path('img/profile').'/'.$user->id.'jpg');
    		
    		$request->image->move(public_path('img/profile'), $user->id.'.jpg');
    	}

    	$user->name = $request->name;
    	$user->biodata->fullname = $request->fullname;
    	$user->biodata->jurusan_id = $request->jurusan;
    	$user->biodata->save();
    	$user->save();

    	return redirect()->back();
    }

    // public function changePassword(Request $request)
    // {
    // 	$user = $request->user();

    // 	if DB::table('users')->where('id', $user->id)->

    // }
}
