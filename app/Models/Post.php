<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
     protected $fillable = ['thread_id', 'user_id', 'content'];

     public function user()
     {
        return $this->belongsTo(User::class, 'user_id');
     }
     public function thread()
     {
        return $this->belongsTo(Thread::class, 'thread_id');
     }

     /* Many 2 Many relationship through post_user_like table */
     public function likedByUsers()
     {
         return $this->belongsToMany(User::class, 'post_user_like')
                     ->withTimestamps();
     }
}
