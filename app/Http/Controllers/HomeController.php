<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('role', 1)->get();
        $comment = Comment::where('parent_id', NULL)->get();
        $article = Post::all();
        $published = Post::where('status', 1)->get();
        $draft = Post::where('status', 0)->get();
        $jumlah_draft = $draft->count();
        $jumlah_published = $published->count();
        $jumlah_article = $article->count();
        $jumlah_user = $user->count();
        $jumlah_comment = $comment->count();
        return view('admin.index',  compact('jumlah_user', 'jumlah_comment', 'jumlah_article', 'jumlah_published', 'jumlah_draft'));
    }
}
