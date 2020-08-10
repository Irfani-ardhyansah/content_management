<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $author = User::where('role', '1')->get();
        return view('admin.author.index', compact('author'));
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }

    public function change_status(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            User::where(['id'=>$id])->update(['status'=>$data['status']]);
            return redirect()->back()->with('success', 'Berhasil Mengubah Status');
        }
    }
}
