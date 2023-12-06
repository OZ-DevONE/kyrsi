<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function edit(Course $course)
    {
        return view('admin.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'img_src' => 'required|url'
        ]);

        $course->update($validatedData);

        return redirect()->route('admin.admin')->with('success', 'Курс успешно обновлен');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.admin')->with('success', 'Курс удален');
    }
}
