<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

use function GuzzleHttp\Promise\all;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', Course::REVISION)->paginate();

        return view('admin.courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.show', compact('course'));
    }

    public function approved(Course $course)
    {
        $this->authorize('revision', $course);
    
        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso incompleto');
        }

        $course->status = 3;
        $course->save();

        // Enviar correo electronico
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('success', 'Curso aprobado y publicado con éxito!');
    }

    public function observations(Course $course)
    {
        $this->authorize('revision', $course);

        return view('admin.courses.observations', compact('course'));
    }

    public function reject(Course $course, Request $request)
    {
        $this->authorize('revision', $course);

        $request->validate([
            'body' => 'required',
        ]);

        $course->observations()->create($request->all());

        $course->status = 1;
        $course->save();

        $mail = new RejectCourse($course);

        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('success', 'Curso rechazado con éxito!');
    }
}
