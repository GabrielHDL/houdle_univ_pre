<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Livewire\Teacher\CoursesCurriculum;
use App\Http\Livewire\Teacher\CoursesStudents;

Route::redirect('/', '/teacher/courses', 301);

Route::resource('/courses'  , CourseController::class)->names('courses');

Route::get('/courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Actualizar cursos')->name('courses.curriculum');

Route::get('/courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');

Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Actualizar cursos')->name('courses.students');

Route::post('/courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');

Route::get('/courses/{course}/observations', [CourseController::class, 'observations'])->name('courses.observations');
