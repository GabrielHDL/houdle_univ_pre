<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', Course::REVISION)->paginate();

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }
}
