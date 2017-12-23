<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;
use App\User;
class Biodata extends Model
{
    protected $fillable = [
    	'fullname', 'nim', 'jurusan_id'
    ];

    public function Jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }

    public function user()
    {
    	return $this->hasOne(User::class);
    }
}

