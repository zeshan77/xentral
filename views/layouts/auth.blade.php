<!doctype html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="bg-light">
<div class="container">

    <div class="mt-4">
        @yield('content')
    </div>
</div>

@include('partials.scripts')
</body>
</html>