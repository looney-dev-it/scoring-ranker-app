<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
class HomeController extends Controller
{
    //
    public function index()
    {
        /* feed the latestThread component */
        $threads = Thread::with(['user', 'posts' => function ($query) {
                $query->latest()->limit(1); // latest post
            }])
            ->withCount('posts') // count total of posts
            ->latest()            // recent
            ->take(5)             // limited to 5
            ->get();
        return view('home', compact('threads'));
    }
}
