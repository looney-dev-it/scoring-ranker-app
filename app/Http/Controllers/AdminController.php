<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\ScoreTopic;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('components.admin.dashboard');
    }

    public function user()
    {
        $users = User::get();

        return view('components.admin.user', ['users' => $users]);
    }

    public function news()
    {
        $news = News::with('author')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('components.admin.news', ['news' => $news]);
    }

    public function score()
    {
        $score_types = ScoreTopic::get();

        return view('components.admin.score', ['score_types' => $score_types]);
    }
}
