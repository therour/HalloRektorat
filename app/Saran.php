<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\User;
use App\Comment;
use App\Target;

class Saran extends Model
{
    protected $fillable = [
    	'title', 'content', 'image_path', 'target_id', 'is_public'
    ];

    protected $dates = [
        'created_at'
    ];
    

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('saran', function (Builder $builder) {
            $builder->orderBy('created_at','desc');
        });
    }

    public function getContentAttribute($value)
    {
        return nl2br(e($value));
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function target()
    {
    	return $this->belongsTo(Target::class);
    }

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function supports()
    {
    	return $this->belongsToMany(User::class, 'supports');
    }

    public function scopeTanggapan($query)
    {
        return $this->comments()->where('type', 'respond')->get();
    }

    public function scopePopular($query)
    {
        return $query->withCount('supports')->orderBy('supports_count', 'desc');
    }

    public function scopeHotTopic($query)
    {
        return $query->withCount('comments')->orderBy('comments_support', 'desc');
    }

    public function isSupported()
    {
        $user_id = \Illuminate\Support\Facades\Auth::check() ? 
                   \Illuminate\Support\Facades\Auth::user()->id : 0;
        $saran_id = $this->attributes['id'];
        return \DB::table('supports')->where('user_id', $user_id)->where('saran_id', $saran_id)->count() > 0;
    }
}
