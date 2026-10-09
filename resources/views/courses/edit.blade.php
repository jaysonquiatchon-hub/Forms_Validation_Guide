<x-layout title="Edit Course">
    <h1>Edit Course: {{ $course->code }}</h1>

    <form method="POST"
          action="{{ route('courses.update', $course) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <x-form-input
            name="code"
            label="Course Code"
            :value="$course->code"
            required
        />

        <x-form-input
            name="title"
            label="Course Title"
            :value="$course->title"
            required
        />

        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
        >{{ old('description', $course->description) }}</textarea>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-form-input
            name="units"
            label="Units"
            type="number"
            :value="$course->units"
            required
        />

        <label for="instructor_id">Instructor</label>
        <select id="instructor_id" name="instructor_id">
            <option value="">-- No instructor --</option>

            @foreach ($instructors as $instructor)
                <option
                    value="{{ $instructor->id }}"
                    @selected(old('instructor_id', $course->instructor_id) == $instructor->id)
                >
                    {{ $instructor->name }}
                </option>
            @endforeach
        </select>
        @error('instructor_id')
            <p class="error">{{ $message }}</p>
        @enderror

        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                @checked(old('is_active', $course->is_active))
            >
            Active
        </label>

        <label for="image">Replace Course Image (optional)</label>
        <input
            id="image"
            name="image"
            type="file"
            accept="image/*"
        >
        @error('image')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Update Course</button>
    </form>

    <p>
        <a href="{{ route('courses.show', $course) }}">Cancel</a>
    </p>
</x-layout>