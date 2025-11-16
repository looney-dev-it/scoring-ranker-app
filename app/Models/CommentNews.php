<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentNews extends Model
{
    //
    protected $fillable = [
        'content',
        'news_id',
        'user_id',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function news()
    {
        return $this->belongsTo(News::class,'news_id');
    }
}
