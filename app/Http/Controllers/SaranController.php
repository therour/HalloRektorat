<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saran;
use App\Comment;
use App\User;

class SaranController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
        setLocale(LC_TIME,'IND');
    }

    public function index() //telusur
    {
        $sarans = Saran::paginate(6);
        return view('saran.index', [
            'sarans' => $sarans,
        ]);
    }

    public function show(Saran $saran)
    {
        $comments = Comment::where('saran_id', $saran->id)->paginate(3);
    	return view('saran.show', [
    		'saran' => $saran ,
            'comments' => $comments ,
    	]);
    }

    public function add()
    {
    	return view('saran.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100' ,
            'target' => 'required|numeric' ,
            'content' => 'required|string' ,
        ]);

        $saran = $request->user()->sarans()->create([
                'title' => $request->title ,
                'target_id' => $request->target ,
                'content' => $request->content ,
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpg,jpeg,png|max:2048' ,
            ]);

            $namaImage = $saran->id.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img/sarans'), $namaImage);
            $image_path = asset('img/sarans/'.$namaImage);
        } else {
            $image_path = asset('parkir.jpg');
        }
        $saran->image_path = $image_path;
        $saran->save();

        return redirect()->route('home');

    }

    public function commentThis(Request $request)
    {
        $request->validate([
            'saran_id' => 'required|numeric' ,
            'content' => 'required|string|max:255' ,
        ]);

        Saran::find($request->saran_id)->comments()
                ->create([
                    'user_id' => $request->user()->id ,
                    'content' => $request->content ,
                ]);

        return redirect()->back();
    }

    public function supportThis(Request $request)
    {
        $request->validate([
            'saran_id' => 'required|numeric'
        ]);

        if (\DB::table('supports')
                ->where('saran_id', $request->saran_id)
                ->where('user_id', $request->user()->id)
                ->count() > 0) 
        {
            // detach support if exist
            Saran::find($request->saran_id)->supports()->detach($request->user()->id);
        }
        else 
        {
            // attach support if not exist
            Saran::find($request->saran_id)->supports()->attach($request->user()->id);
        }

        return redirect()->back();
    }

}
