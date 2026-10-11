<x-layout title="New Course">
    <h1>New Course</h1>

    @include('courses._form')

    <p>
        <a href="{{ route('courses.index') }}">Back to Courses</a>
    </p>
</x-layout>