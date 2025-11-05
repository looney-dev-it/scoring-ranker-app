<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $casts = [
        'birth_date' => 'datetime',
    ];
    
    protected $fillable = [
        'photo',
        'bio',
        'birth_date',
        'user_id',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
