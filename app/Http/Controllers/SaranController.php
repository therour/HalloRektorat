<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\Saran;
use App\Comment;
use App\User;

class SaranController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(String $urutan = '') //telusur
    {
        if ($urutan == 'populer') {
            $sarans = Saran::withCount('supports')->orderBy('supports_count', 'desc')->paginate(12);
        } else if ($urutan == 'terbaru') {
            $sarans = Saran::paginate(12);
        } else if ($urutan == 'komentar') {
            $sarans = Saran::withCount('comments')->orderBy('comments_count', 'desc')->paginate(12);
        } else if (isset($_GET['cari'])) {
            return $this->pencarian($_GET['cari']);
        } else {
            $sarans = Saran::paginate(12);
        }
        return view('saran.index', [
            'sarans' => $sarans,
        ]);
    }

    public function pencarian($query)
    {
        $sarans = Saran::where('title','LIKE','%'.$query.'%')
                       ->orWhere('content', 'LIKE', '%'.$query.'%')
                       ->paginate(12);

        return view('saran.index', [
            'sarans' => $sarans ,
        ]);        
    }

    public function show(Saran $saran)
    {
        $comments = $saran->comments()->paginate(3);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100' ,
            'target' => 'required|numeric' ,
            'content' => 'required|string' ,
            'agree' => 'accepted' ,
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator, 'kirimsaran')->withInput();
        }
        
        $saran = Auth::User()->sarans()->create([
                'title' => $request->title ,
                'target_id' => $request->target ,
                'content' => $request->content ,
        ]);


        if ($request->hasFile('image')) {
            $imageValidator = Validator::make($request->all(), [
                'image' => 'image|mimes:jpg,jpeg,png,bmp|max:2048' ,
            ]);

            if ($imageValidator->fails())
            {
                return redirect()->back()->withErrors($imageValidator, 'kirimsaran')->withInput();
            }

            $namaImage = $saran->id.'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('img/sarans'), $namaImage);
            $image_path = asset('img/sarans/'.$namaImage);
        } else {
            $image_path = asset('img/sarans/no-image.png');
        }

        $saran->image_path = $image_path;
        $saran->save();

        return redirect()->route('home')->with('success', 'Terima kasih atas masukan anda');

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
            $tambah = FALSE;
        }
        else 
        {
            // attach support if not exist
            Saran::find($request->saran_id)->supports()->attach($request->user()->id);
            $tambah = TRUE;
        }

        // return redirect()->back();
        $count = \DB::table('supports')->where('saran_id', $request->saran_id)->count();
        return response()->json([
            'count' => $count ,
            'tambah' => $tambah
        ]);
    }

}
