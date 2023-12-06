<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseApplication;
use Illuminate\Support\Facades\Auth;

class CourseApplicationController extends Controller
{
    public function apply(Request $request, $courseId)
    {
        if (Auth::check()) {
            CourseApplication::create([
                'user_id' => auth()->user()->id,
                'course_id' => $courseId,
                'status' => 'На рассмотрение'
            ]);

            return back()->with('success', 'Регистрация на курс прошла успешно.');
        } else {
            return back()->with('error', 'Вы не аутентифицированы.');
        }
    }
}

