<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)
            ->with('author')
            ->with('comments')
            ->latest()
            ->take(50)
            ->get();
        return view('news.index', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}
