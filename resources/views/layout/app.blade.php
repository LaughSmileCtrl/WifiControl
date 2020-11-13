<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset("bootstrap/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>
    @yield('style')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src={{ asset ("jquery/jquery.min.js") }} ></script>
    <script src={{ asset ("bootstrap/js/bootstrap.min.js") }} ></script>
    <script src={{ asset("fontawesome/js/fontawesome.min.js") }}></script>
    @yield('script')
</body>
</html>