<?php

namespace App\Http\Controllers\Nonuser;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('nonuser.home');
    }

}
