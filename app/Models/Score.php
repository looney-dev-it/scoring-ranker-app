<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    //
    protected $fillable = ['user_id', 'topic_id', 'score'];

    public function topic()
    {
        return $this->belongsTo(ScoreTopic::class, 'topic_id');
    }

    /* Get latest scores limited by $limit order by created date -> for component latestScores*/
    public static function latestScores($limit = 5)
    {
        return self::with('user')
                   ->with('topic')
                   ->orderBy('created_at', 'desc')
                   ->take($limit)
                   ->get();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
