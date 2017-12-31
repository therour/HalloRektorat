<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Saran;

class SaranController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth','admin']);
    }

    public function index()
    {
    	return view('admin.sarans', [
    		'sarans' => Saran::paginate(10),
    	]);
    }

    public function tanggapi(Request $request, Saran $saran)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $saran->comments()->create([
            'type' => 'respond' ,
            'content' => $request->content ,
            'user_id' => $request->user()->id ,
        ]);

        $saran->status = 'responded';
        $saran->save();

        return redirect()->back();
    }

    public function destroy(Request $request, Saran $saran)
    {
        if ($request->user()->jabatan != 'admin')
        {
            return abort(404);
        }
        $saran->comments()->delete();
        $saran->supports()->detach();
        $saran->delete();

        return redirect()->back();
    }
}
