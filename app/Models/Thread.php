<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $fillable = ['scoretopic_id', 'title', 'user_id', 'pinned'];

    public function type()
    {
        return $this->belongsTo(ScoreTopic::class, 'scoretopic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'thread_id');
    }
}
