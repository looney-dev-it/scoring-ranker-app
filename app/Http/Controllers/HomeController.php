<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home', [
            'latestNews' => News::where('is_published', true)
                                ->latest()
                                ->take(3)
                                ->get(),
            // 'recentUsers' => User::latest()->take(5)->get(),
        ]);
    }
}
