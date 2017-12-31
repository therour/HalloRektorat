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
        if (isset($_GET['cari']) && !empty($_GET['cari'])) {
            $cari = e($_GET['cari']);
            $users = User::where('jabatan', 'user')
                         ->where('name', 'LIKE', '%'.$cari.'%')
                         ->orWhere('email', 'LIKE', '%'.$cari.'%')
                         ->paginate(10);
        } else {
            $users = User::where('jabatan', 'user')->paginate(10);
        }

    	return view('admin.users', [
    		'users' => $users,
    	]);
    }
}
