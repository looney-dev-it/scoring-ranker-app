<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentProfile extends Model
{
    //
    protected $fillable = [
        'content',
        'profile_id',
        'user_id',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class,'news_id');
    }
}
