<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan nilai dari categori beserta relasi categorinya
        $categories = Category::with('course')->get();
        return view('course.course', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengarahkan ke halaman form create course
        return view('course.create',[
            'categories' => Category::all()
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
        // validasi semua field yang ada di table course
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        //  membuat semua value course
        $course = Course::create($request->all());

        $course->name = ucwords($course->name);
        // mengecek tipe file image dan mengirim ke database
        if($request->hasFile('image'))
        {
            $request->file('image')->move('course', $request->file('image')->getClientOriginalName());
            $course->image =$request->file('image')->getClientOriginalName();
            $course->save();
        }

        // mengembalikan nilai dari course ke dalam halaman course
        return redirect('/courses')->with('Success','Course ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.detail', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        // mengembalikan ke halaman edit beserta value dari category
        return view('course.edit',[
            'categories' => Category::all()
        ],compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'desc' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $course = Course::find($course->id);
        $course->name = ucwords($course->name);
        if($request->hasFile('image'))
        {
            $request->file('image')->move('course', $request->file('image')->getClientOriginalName());
            $course->image = $request->file('image')->getClientOriginalName();
            $course->save();
        }

        redirect('/course')->with('Success','Course berhasil di edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);

        return redirect('/course')->with('Success','Course berhasil di hapus');
    }
}
