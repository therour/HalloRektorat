<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Biodata;

class Jurusan extends Model
{
    public function biodatas()
    {
    	return $this->hasMany(Biodata::class);
    }

}
