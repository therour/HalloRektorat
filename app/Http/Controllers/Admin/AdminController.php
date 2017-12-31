<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saran;

class AdminController extends Controller
{
    
    public function __construct()
    {
    	$this->middleware(['auth','admin']);
    }

    public function index()
    {
    	return view('admin.dashboard', [
    		'jumlahbaru' => Saran::where('status','send')->count() ,
    		'sarans' => Saran::withoutGlobalScope('saran')->where('status', 'send')->paginate(5)
    	]);
    }

}
