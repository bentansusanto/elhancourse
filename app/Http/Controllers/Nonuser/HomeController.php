<?php

namespace App\Http\Controllers\Nonuser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mentor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('nonuser.home',compact('categories'));
    }

    public function about()
    {
        return view('nonuser.about');
    }

    public function mentor()
    {
        $mentors = Mentor::with('category')->get();

        return view('nonuser.mentor', compact('mentors'));
    }

    public function contact()
    {
        return view('nonuser.contact');
    }

}
