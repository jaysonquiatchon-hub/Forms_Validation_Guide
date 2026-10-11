@php
    $isEditing = isset($course);
@endphp

<form
    method="POST"
    action="{{ $isEditing ? route('courses.update', $course) : route('courses.store') }}"
    enctype="multipart/form-data"
>
    @csrf

    @if ($isEditing)
        @method('PUT')
    @endif

    <x-form-input
        name="code"
        label="Course Code"
        :value="old('code', $course->code ?? '')"
        required
    />

    <x-form-input
        name="title"
        label="Course Title"
        :value="old('title', $course->title ?? '')"
        required
    />

    <label for="description">Description</label>
    <textarea
        id="description"
        name="description"
    >{{ old('description', $course->description ?? '') }}</textarea>
    @error('description')
        <p class="error">{{ $message }}</p>
    @enderror

    <x-form-input
        name="units"
        label="Units"
        type="number"
        :value="old('units', $course->units ?? 3)"
        required
    />

    <label for="instructor_id">Instructor</label>
    <select id="instructor_id" name="instructor_id">
        <option value="">-- No instructor --</option>

        @foreach ($instructors as $instructor)
            <option
                value="{{ $instructor->id }}"
                @selected(old('instructor_id', $course->instructor_id ?? '') == $instructor->id)
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
            @checked(old('is_active', $course->is_active ?? true))
        >
        Active
    </label>
    @error('is_active')
        <p class="error">{{ $message }}</p>
    @enderror

    @if ($isEditing && $course->image_path)
        <p>Current Course Image:</p>
        <img
            src="{{ asset('storage/' . $course->image_path) }}"
            alt="{{ $course->title }}"
            style="max-width: 200px; height: auto;"
        >
    @endif

    <label for="image">
        {{ $isEditing ? 'Replace Course Image (optional)' : 'Course Image' }}
    </label>

    <input
        id="image"
        name="image"
        type="file"
        accept="image/*"
    >
    @error('image')
        <p class="error">{{ $message }}</p>
    @enderror

    <button type="submit">
        {{ $isEditing ? 'Update Course' : 'Save Course' }}
    </button>
</form>