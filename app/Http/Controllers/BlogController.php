<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategories = Kategori::with('blog')->get();

        return view('blog.blog', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create',[
            'kategories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $blog = Blog::create($request->all());

        $blog->title = ucwords($blog->title);

        if ($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blogs')->with('Success','Blog berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.detail',[
            'kategories' => Kategori::all()
        ], compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit',[
            'kategories' => Kategori::all()
        ], compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $blog = Blog::find($blog->id);

        $blog->title = ucwords($blog->title);

        if ($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blogs')->with('Success','Blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy($blog->id);
        
        return redirect('/blogs')->with('Success','Blog berhasil dihapus');
    }
}
