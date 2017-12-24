<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saran;

class SaranController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function all()
    {
    	return view('saran.index', [
    		'sarans' => Saran::all(),
    	]);
    }

    public function index()
    {
        return view('saran.index');
    }

    public function show(Saran $saran)
    {
    	return view('saran.show', [
    		'saran' => $saran
    	]);
    }

    public function add()
    {
    	return view('saran.add');
    }


}
