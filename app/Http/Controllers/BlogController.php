<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.index", ["blogs"=> $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $validated = $request->validate([
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10',
            // 'description'   => 'required|min:10',
        ]);
        //upload image
        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));
        // mebnambahkan ke dalam database
        Blog::create([
            "title" => $validated["title"],
            "content" => $validated["content"],
            // "description" => $validated["description"],
            'image' => $saveImage['image']
        ]);

        //redirect to index
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        // validasi form
        $validated = $request->validate([
            "title" => "string",
            "content" => "string",
            'image' => 'mimes:jpg,jpeg,png|max:5120' // Menghapus 'required' untuk gambar
        ]);

        // Cek apakah ada unggahan gambar baru
        if ($request->hasFile('image')) {
            // Hapus foto yang lama
            Storage::delete($blog->image);

            // Simpan foto yang baru
            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang sudah ada
            $newImage = ['image' => $blog->image];
        }

        // Update data di database
        Blog::where('id', $id)->update([
            "title" => $validated["title"],
            "content" => $validated["content"],
            'image' => $newImage['image']
        ]);

        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect('/blog');
    }
}
