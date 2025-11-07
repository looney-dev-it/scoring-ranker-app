<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Score;
class HomeController extends Controller
{
    //
    public function index()
    {
        $latestScores = Score::latestScores(5);
        $latestNews = News::latestNews();
        // return view('home', compact('latestNews'));
        return view('home', compact('latestScores', 'latestNews'));
    }
}
