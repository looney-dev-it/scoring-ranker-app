<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
class HomeController extends Controller
{
    //
    public function index()
    {
        $threads = Thread::with(['user', 'posts' => function ($query) {
                $query->latest()->limit(1); // dernier post
            }])
            ->withCount('posts') // nombre total de posts
            ->latest()            // threads les plus récents
            ->take(5)             // limite à 5 threads
            ->get();
        return view('home', compact('threads'));
    }
}
