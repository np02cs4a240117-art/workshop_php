<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6CS056 Workshop 1</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; background: #f4f6f8; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 350px; }
        h1 { color: #ff2d20; font-size: 1.5rem; text-align: center; }
        ul { list-style: none; padding: 0; }
        li { background: #eef2f5; margin: 8px 0; padding: 10px; border-radius: 4px; font-weight: bold; }
        span { color: #555; font-weight: normal; }
    </style>
</head>
<body>
    <div class="card">
        <h1>6CS056 - Workshop 1</h1>
        <p><strong>Database Courses:</strong></p>
        <ul>
            @foreach($courses as $course)
                <li>{{ $course->code }}: <span>{{ $course->name }}</span></li>
            @endforeach
        </ul>
    </div>
</body>
</html>
