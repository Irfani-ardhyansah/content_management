<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $article = Post::all();
        return view('admin.article.index', compact('article'));
    }

    public function add()
    {
        return view('admin.article.add');
    }

    public function save(Request $request)
    {
        //MELAKUKAN VALIDASI DATA YANG DIKIRIM DARI FORM INPUTAN
        $validator = Validator::make($request->all(), [
            // 'title' => 'required|string|max:100',
            // 'cover' => "mimes:jpg|max:2000",
            // 'content' => 'required',
        ]);

        try {

            if($request->hasFile('cover')){
                $file = $request->file('cover');
                $nama_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                // $nama_file = $request->title;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file . '_'.time().'.'.$extension;
                $request->file('cover')->move('image/', $fileName);
                $cover = $fileName;
            } else {
                $cover = NULL;
            }

            //MENYIMPAN DATA KEDALAM DATABASE
            $article = Post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'cover' => $cover,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'status' => $request->status
            ]);

            //REDIRECT KEMBALI KE HALAMAN /PRODUCT DENGAN FLASH MESSAGE SUCCESS
            return redirect('/admin/article')->with(['success' => '<strong>' . $article->title . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            //APABILA TERDAPAT ERROR MAKA REDIRECT KE FORM INPUT
            //DAN MENAMPILKAN FLASH MESSAGE ERROR
            return redirect('/admin/article/add')->with(['error' => $e->getMessage()]);
        }
    }

    public function postImage(Request $request)
    {
        //JIKA ADA DATA YANG DIKIRIMKAN
        if ($request->hasFile('upload')) {
            $file = $request->file('upload'); //SIMPAN SEMENTARA FILENYA KE VARIABLE
            $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); //KITA GET ORIGINAL NAME-NYA
            //KEMUDIAN GENERATE NAMA YANG BARU KOMBINASI NAMA FILE + TIME
            $fileName = $fileName . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $fileName); //SIMPAN KE DALAM FOLDER PUBLIC/UPLOADS

            //KEMUDIAN KITA BUAT RESPONSE KE CKEDITOR
            $ckeditor = $request->input('CKEditorFuncNum');
            $url = asset('uploads/' . $fileName); 
            $msg = 'Image uploaded successfully'; 
            //DENGNA MENGIRIMKAN INFORMASI URL FILE DAN MESSAGE
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($ckeditor, '$url', '$msg')</script>";

            //SET HEADERNYA
            @header('Content-type: text/html; charset=utf-8'); 
            return $response;
        }
    }

    public function change_status(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            Post::where(['id'=>$id])->update(['status'=>$data['status']]);
            return redirect()->back()->with('success', 'Berhasil Mengubah Status');
        }
    }

    public function delete($id)
    {
        $data = Post::findOrFail($id);
        $data -> delete();
        return back()->with(['success' => 'Berhasil Dihapus']);
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        return view('admin.article.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $article = Post::findOrFail($id);
            $article->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
            ]);

            if($request->hasFile('cover')){
                $file = $request->file('cover');
                $nama_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                // $nama_file = $request->title;
                $extension  = $file->getClientOriginalExtension();
                $fileName = $nama_file . '_'.time().'.'.$extension;
                $request->file('cover')->move('image/', $fileName);
                $article->cover = $fileName;
                $article->save();
            }

            return redirect('/admin/article')->with(['success' => '<strong>' . $article->title . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            return redirect('/admin/article/edit/'.$article->id)->with(['error' => $e->getMessage()]);
        }
    }
}
