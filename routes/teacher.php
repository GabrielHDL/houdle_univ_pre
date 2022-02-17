<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Teacher\CourseController;
use App\Http\Livewire\Teacher\CoursesCurriculum;

Route::redirect('/', '/teacher/courses', 301);

Route::resource('/courses'  , CourseController::class)->names('courses');

Route::get('/courses/{course}/curriculum', CoursesCurriculum::class)->name('courses.curriculum');
