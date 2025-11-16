<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreTopic extends Model
{
    //
    
    protected $fillable = ['title', 'unit', 'type_id'];

    public function type()
    {
        return $this->belongsTo(ScoreType::class, 'type_id');
    }

    public function threads()
    {
        return $this->hasMany(Thread::class,'scoretopic_id');
    }

}
