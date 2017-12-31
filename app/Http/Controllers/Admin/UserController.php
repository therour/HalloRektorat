<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth','admin']);
    }

    public function index()
    {
    	return view('admin.users', [
    		'users' => User::where('jabatan', 'user')->paginate(10)
    	]);
    }
}
