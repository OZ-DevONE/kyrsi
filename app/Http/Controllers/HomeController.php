<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseApplication;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $applications = CourseApplication::where('user_id', Auth::id())->get();
        return view('home', ['applications' => $applications]);
    }
}
