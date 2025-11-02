<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
class AdminController extends Controller
{
    //
    public function index()
    {
        /*$news = News::with('author')
            ->latest()
            ->take(50)
            ->get();
        
        $users = User::get();
        return view('admin', ['news' => $news, 'users' => $users]);*/
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
}
