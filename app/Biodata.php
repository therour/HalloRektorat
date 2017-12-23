<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
    	'fullname', 'nim', 'jurusan_id'
    ];

    public function Jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
}

