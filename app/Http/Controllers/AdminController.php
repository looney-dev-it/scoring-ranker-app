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
        $news = News::with('user')
            ->latest()
            ->take(50)
            ->get();
        
        $users = User::get();
        return view('admin', ['news' => $news, 'users' => $users]);
    }
}
