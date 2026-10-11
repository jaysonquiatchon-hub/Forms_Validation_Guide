<x-layout title="Edit Course">
    <h1>Edit Course: {{ $course->code }}</h1>

    @include('courses._form')

    <p>
        <a href="{{ route('courses.show', $course) }}">Cancel</a>
    </p>
</x-layout>