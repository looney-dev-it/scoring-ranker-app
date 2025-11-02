<?php

namespace App\Models;

use App\Models\User;
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
        'image_path',
        'is_published',
        'published_at',
        'user_id',
    ]; 

    public static function latestNews($limit = 3)
    {
        return self::with('author')
                   ->orderBy('published_at', 'desc')
                   ->take($limit)
                   ->get();
    }
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
