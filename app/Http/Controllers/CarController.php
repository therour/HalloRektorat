<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function formTambahMobil()
    {
    	return view('formtambah');
    }
}
