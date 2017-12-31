<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'content', 'user_id', 'type'
	];

	protected $dates = [
		'created_at'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function saran()
    {
    	return $this->belongsTo(Saran::class);
    }

}
