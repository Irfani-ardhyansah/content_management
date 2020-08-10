<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function article()
    {
        $data = Post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
        return view('user.article', compact('data'));
    }

    public function detail_article($slug)
    {
        // $row = Post::findOrFail($slug);
        $post = Post::with(['comments', 'comments.child'])->where('slug', $slug)->first();
        return view('user.detail_article', compact('post'));
    }

    public function comment(Request $request)
    {
        //VALIDASI DATA YANG DITERIMA
        $this->validate($request, [
            'email' => 'required',
            'comment' => 'required'
        ]);
        try{
            Comment::create([
                'post_id' => $request->id,
                //JIKA PARENT ID TIDAK KOSONG, MAKA AKAN DISIMPAN IDNYA, SELAIN ITU NULL
                'parent_id' => $request->parent_id != '' ? $request->parent_id:NULL,
                'email' => $request->email,
                'comment' => $request->comment
            ]);
            return redirect()->back()->with(['success' => 'Komentar Ditambahkan']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Komentar Gagal Ditambahkan!']);
        }
    }
}
