<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreType extends Model
{
    //
    protected $fillable = [
        'name',
    ]; 

    
    public function topics()
    {
        return $this->hasMany(ScoreTopic::class, 'type_id');
    }

}
