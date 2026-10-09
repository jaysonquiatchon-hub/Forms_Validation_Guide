<x-layout title="New Course">
    <h1>New Course</h1>

    <form method="POST"
          action="{{ route('courses.store') }}"
          enctype="multipart/form-data">

        @csrf

        <x-form-input
            name="code"
            label="Course Code"
            :value="old('code')"
            required
        />

        <x-form-input
            name="title"
            label="Course Title"
            :value="old('title')"
            required
        />

        <label for="description">Description</label>
        <textarea
            id="description"
            name="description"
        >{{ old('description') }}</textarea>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror

        <x-form-input
            name="units"
            label="Units"
            type="number"
            :value="old('units', 3)"
            required
        />

        <label for="instructor_id">Instructor</label>
        <select id="instructor_id" name="instructor_id">
            <option value="">-- No instructor --</option>

            @foreach ($instructors as $instructor)
                <option
                    value="{{ $instructor->id }}"
                    @selected(old('instructor_id') == $instructor->id)
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
                @checked(old('is_active', true))
            >
            Active
        </label>

        <label for="image">Course Image</label>
        <input
            id="image"
            name="image"
            type="file"
            accept="image/*"
        >
        @error('image')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit">Save Course</button>
    </form>

    <p>
        <a href="{{ route('courses.index') }}">Back to Courses</a>
    </p>
</x-layout>