<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentors = Mentor::with('course')->get();
        return view('mentor.mentor', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mentor.create');
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
            'name' => 'required',
            'email' => 'required|email:dns',
            'quotes' => 'required',
            'social_media' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $mentor = Mentor::create($request->all());

        $mentor->name = ucwords($mentor->name);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('mentor', $request->file('image')->getClientOriginalName());
            $mentor->image = $request->file('image')->getClientOriginalName();
            $mentor->save();
        }

        return redirect('/mentors')->with('Success','Mentor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        return view('mentor.detail',[
            'courses' => Course::all()
        ], compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function edit(Mentor $mentor)
    {
        return view('mentor.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'quotes' => 'required',
            'social_media' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $mentor = Mentor::find($mentor->id);

        $mentor->name = ucwords($mentor->name);

        if($request->hasFile('image'))
        {
            $request->file('image')->move('mentor', $request->file('image')->getClientOriginalName());
            $mentor->image = $request->file('image')->getClientOriginalName();
            $mentor->save();
        }

        return redirect('/mentors')->with('Success','Mentor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mentor $mentor)
    {
        Mentor::destroy($mentor->id);

        return redirect('/mentors')->with('Success','Mentor berhasil dihapus');
    }
}
