<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Course Portal' }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
            line-height: 1.6;
        }

        nav {
            margin-bottom: 1.5rem;
        }

        nav a {
            margin-right: 1rem;
        }

        input, select, textarea, button {
            padding: 0.5rem;
            margin-top: 0.25rem;
        }

        label {
            display: block;
            margin-top: 0.75rem;
        }

        .error {
            color: #c00;
        }

        .success {
            color: #080;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('courses.index') }}">Courses</a>
        |
        <a href="{{ route('courses.create') }}">New Course</a>
    </nav>

    @if (session('status'))
        <p class="success">{{ session('status') }}</p>
    @endif

    {{ $slot }}
</body>
</html>