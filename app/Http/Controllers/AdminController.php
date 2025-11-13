<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\ScoreTopic;
use App\Models\Category;
use App\Models\Question;
use App\Models\ContactRequest;


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

    public function faq()
    {
        $categories = Category::get();
        $questions = Question::with('category')->get();
        return view('components.admin.faq', ['categories' => $categories,
                                            'questions' => $questions ]);
    }

    public function contact()
    {
        $contactrequests = ContactRequest::get();

        return view('components.admin.contact', ['contactrequests' => $contactrequests]);
    }
}
