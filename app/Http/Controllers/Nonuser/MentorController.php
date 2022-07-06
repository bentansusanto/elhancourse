<?php

namespace App\Http\Controllers\Nonuser;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function mentor()
    {
        $mentors = Mentor::all();

        return view('nonuser.mentor', compact('mentors'));   
    }
}
