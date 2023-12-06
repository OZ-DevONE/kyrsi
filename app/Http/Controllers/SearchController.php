<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $courses = Course::where('title', 'LIKE', "%{$query}%")
                         ->orWhere('description', 'LIKE', "%{$query}%")
                         ->get();

        return view('search.serch', compact('courses'));
    }
}
