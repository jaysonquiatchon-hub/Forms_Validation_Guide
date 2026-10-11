<x-layout :title="$course->code">
    <h1>{{ $course->code }} — {{ $course->title }}</h1>

    @if ($course->image_path)
        <div>
            <strong>Course Image:</strong>
            <br>
            <img
                src="{{ asset('storage/' . $course->image_path) }}"
                alt="{{ $course->title }}"
                style="max-width: 300px; height: auto; margin-top: 10px;"
            >
        </div>
    @else
        <p>No course image uploaded.</p>
    @endif

    <p>
        <strong>Description:</strong>
        {{ $course->description ?? 'No description available.' }}
    </p>

    <p>
        <strong>Instructor:</strong>
        {{ $course->instructor?->name ?? 'No instructor assigned' }}
    </p>

    <p>
        <strong>Units:</strong>
        {{ $course->units }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $course->is_active ? 'Active' : 'Inactive' }}
    </p>

    <p>
        <a href="{{ route('courses.index') }}">Back to Courses</a>
        |
        <a href="{{ route('courses.edit', $course) }}">Edit Course</a>
    </p>

    <hr>

    <form
        method="POST"
        action="{{ route('courses.destroy', $course) }}"
        onsubmit="return confirm('Are you sure you want to delete this course?');"
    >
        @csrf
        @method('DELETE')

        <button type="submit">Delete Course</button>
    </form>
</x-layout>