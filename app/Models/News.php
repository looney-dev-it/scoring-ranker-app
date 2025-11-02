<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean'
    ];

    protected $fillable = [
        'title',
        'content',
        'is_published',
        'published_at',
    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
