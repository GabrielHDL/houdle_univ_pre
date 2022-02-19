<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function show(Course $course, Certificate $certificate)
    {


        return view('courses.certificate.show', compact('course', 'certificate'));
    }
}
