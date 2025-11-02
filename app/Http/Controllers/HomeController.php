<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class HomeController extends Controller
{
    //
    public function index()
    {
        $latestNews = News::latestNews();
        return view('home', compact('latestNews'));
    }
}
