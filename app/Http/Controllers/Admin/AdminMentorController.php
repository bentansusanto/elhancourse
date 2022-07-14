<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mentor;
use Illuminate\Http\Request;

class AdminMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mentors = Mentor::with('category')->get();
        return view('admin.mentor.mentor',compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mentor.create',[
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
        // dd($request->all());

         $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'email' => 'required|email:dns',
            'quotes' => 'required',
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

        return redirect('/mentors')->with('Success','Create Mentor Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mentor  $mentor
     * @return \Illuminate\Http\Response
     */
    public function show(Mentor $mentor)
    {
        return view('admin.mentor.detail',[
            'categories' => Category::all()
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
        return view('admin.mentor.edit',compact('mentor'));
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
            'category_id' => 'required',
            'email' => 'required|email:dns',
            'quotes' => 'required',
            'image' => 'required|file|max:1024'
        ]);

        $mentor = Mentor::find($mentor->id);
        $mentor->update($request->all());

        $mentor->name = ucwords($mentor->name);
        if($request->hasFile('image'))
        {
            $request->file('image')->move('mentor', $request->file('image')->getClientOriginalName());
            $mentor->image = $request->file('image')->getClientOriginalName();
            $mentor->save();
        }

        return redirect('/mentors')->with('Success','Update Mentor Successfully');
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
        
        return redirect('/mentors')->with('Success','Delete Mentor Successfully');
    }
}
