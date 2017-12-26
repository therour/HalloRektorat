<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Biodata;
use App\Saran;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function sarans()
    {
        return $this->hasMany(Saran::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function supports()
    {
        return $this->belongsToMany(Saran::class, 'supports');
    }

    public function imageProfile()
    {
        if (\File::Exists('img/profile/'.$this->attributes['id'].'.jpg')){
            return asset('img/profile/'.$this->attributes['id'].'.jpg');
        }
        else{
            return asset('img/profile/default.jpg');
        }        
    }
}
