<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreType;
use App\Models\ScoreTopic;
use App\Models\Thread;

class ForumController extends Controller
{
    //
    public function index()
    {
        $scoreTypes = ScoreType::with([
            'topics' => function ($query) {
                $query->withCount('threads')
                      ->with(['threads.posts' => function ($q) {
                          $q->latest()->limit(1);
                      }]);
            }
        ])->get();

        $scoreTypes->each(function ($scoreType) {
            $scoreType->topics->each(function ($topic) {
                $topic->latest_post = $topic->threads
                    ->flatMap->posts
                    ->sortByDesc('created_at')
                    ->first();
            });
        });

        return view('forum.index', compact('scoreTypes'));
    }

    public function showScoreTopic($id)
    {
        $scoreTopic = ScoreTopic::findOrFail($id);

        $threads = $scoreTopic->threads()
            ->withCount('posts')
            ->with(['posts' => function ($query) {
                $query->latest()->limit(1);
            }, 'user'])
            ->get();

        $threads->map(function ($thread) {
            $thread->latest_post = $thread->posts->sortByDesc('created_at')->first();
            return $thread;
        });

        return view('forum.topic', compact('scoreTopic', 'threads'));
    }

    public function showThread($scoreTopicId, $threadId)
    {
        // Get parent topic
        $scoreTopic = ScoreTopic::findOrFail($scoreTopicId);

        // Get Threads with posts & user 
        $thread = Thread::with([
            'user',
            'posts.user'
        ])->findOrFail($threadId);

        return view('forum.thread', compact('scoreTopic', 'thread'));
    }
}
