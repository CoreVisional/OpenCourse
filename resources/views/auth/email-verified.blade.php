<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>OpenCourse | Largest Online Free Courses Platform</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5 mb-5">
            <div class="row">
                <h1 class="fw-bold">Email Verified</h1>
                <hr class="my-4">
                <p class="lead">The email address, <b>{{ Auth::user()->email }}</b>, has been verified. Thank you!</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">« Back to OpenCourse</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
