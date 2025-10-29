<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')
            ->latest()
            ->take(50)
            ->get();
        return view('home', ['all_news' => $news]);
    }
}
