<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saran;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sarans = Saran::where('is_public', 'public')->orderBy('created_at','desc')->paginate(5);
        $carousels = Saran::withCount('supports')->orderBy('supports_count', 'desc')->take(4)->get();
        return view('home', [
            'sarans' => $sarans ,
            'carousels' => $carousels ,
        ]);
    }

    public function about()
    {
        return view('about');
    }
}
