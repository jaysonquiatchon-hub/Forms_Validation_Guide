<x-layout title="Courses">
    <h1>Courses</h1>

    <p>List of available courses:</p>

    <ul>
        @foreach ($courses as $c)
            <li>
                <a href="{{ route('courses.show', $c) }}">
                    {{ $c->code }} — {{ $c->title }}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>