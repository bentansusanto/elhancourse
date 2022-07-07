<?php

namespace App\Http\Controllers\Nonuser;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        return view('nonuser.home',compact('categories'));
    }

}
