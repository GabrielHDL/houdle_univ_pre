<x-teacher-layout :course="$course">

    <div>
        @livewire('teacher.courses-goals', ['course' => $course], key('courses-goals' . $course->id))
    </div>

    <div class="my-8">
        @livewire('teacher.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
    </div>

    <div>
        @livewire('teacher.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
    </div>

</x-teacher-layout>