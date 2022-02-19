<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesStudents extends Component
{
    use AuthorizesRequests, WithPagination;

    public $course, $search;

    public function mount(Course $course)
    {
        $this->course = $course;

        $this->authorize('dictated', $course);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = $this->course->students()
                                ->where('name', 'LIKE', '%' . $this->search . '%')
                                ->paginate(4);

        return view('livewire.teacher.courses-students', compact('students'))->layout('layouts.teacher', ['course' => $this->course]);
    }
}
