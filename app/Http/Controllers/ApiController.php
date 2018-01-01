<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saran;

class ApiController extends Controller
{
    // 
    public function getTargets()
    {
        $a['data'] = \App\Target::all();
        return json_encode( (object) $a);
    }

    public function getTarget($id)
    {
        $a['data'] = \App\Target::where('parent_id', $id)->get();
        return json_encode( (object) $a);
    }
}
