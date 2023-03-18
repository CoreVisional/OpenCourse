<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('partials._head')
    </head>

    <body class="primary-bg-color d-flex flex-column min-vh-100">

        <div id="app">
            @include('partials._nav')
            <div>
                @yield('content')
            </div>
            @include('partials._footer')
        </div>

        {{-- Scripts --}}
        @vite(['resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>
