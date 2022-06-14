<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request; 
use App\Models\Blog;
use App\Models\Kategori;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::with('blog')->get();

        return view('blog.blog', compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
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

        $blog->name = ucwords($blog->name);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blog')->with('Success','Blog berhasil ditambahkan');
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
            'kategoris' => Kategori::all()
        ],compact('blog'));
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
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
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

        $blog->name = ucwords($blog->name);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('blog', $request->file('image')->getClientOriginalName());
            $blog->image = $request->file('image')->getClientOriginalName();
            $blog->save();
        }

        return redirect('/blog')->with('Success','Blog berhasil diubah');
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

        return redirect('/blog')->with('Success','Blog berhasil dihapus');
    }
}
