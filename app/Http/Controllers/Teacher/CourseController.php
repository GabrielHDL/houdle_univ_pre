<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;

use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Leer cursos')->only('index');
        $this->middleware('can:Crear cursos')->only('create', 'store');
        $this->middleware('can:Actualizar cursos')->only('edit', 'update', 'goals');
        $this->middleware('can:Eliminar cursos')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('teacher.courses.create', compact('categories', 'levels', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course = Course::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('/public/courses', $request->file('file'));

            $course->image()->create([
                'url' => $url,
            ]);
        }

        return redirect()->route('teacher.courses.edit', $course)
                         ->with('info-create', 'Curso creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('teacher.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('dictated', $course);

        $categories = Category::pluck('name', 'id');
        $levels = Level::pluck('name', 'id');
        $prices = Price::pluck('name', 'id');

        return view('teacher.courses.edit', compact('course', 'categories', 'levels', 'prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('dictated', $course);

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('public/courses', $request->file('file'));

            if ($course->image) {
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url
                ]);
            }else {
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('teacher.courses.edit', $course)
                         ->with('info-update', 'Curso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function goals(Course $course)
    {
        $this->authorize('dictated', $course);
        return view('teacher.courses.goals', compact('course'));
    }

    public function status(Course $course)
    {
        $course->status = 2;
        $course->save();

        if ($course->observations) {
            $course->observations->delete();
        }
        
        return redirect()->route('teacher.courses.edit', $course)
                         ->with('info-wait', 'Curso enviado a revisión con éxito');
    }

    public function observations(Course $course)
    {
        return view('teacher.courses.observations', compact('course'));
    }
}
