<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Saran;

class Target extends Model
{
    
    protected $fillable = [
    	'name', 'parent_id'
    ];

    public function parent()
    {
    	return $this->belongsTo($this);
    }

    public function sarans()
    {
    	return $this->hasMany(Saran::class);
    }

    public function singkatan()
    {
    	$nama = $this->attributes['name'];
    	if (strlen($nama) > 7) {
    		return preg_replace('/[^A-Z]/', "", $nama);
    	}
    	return $nama;
    }
}
