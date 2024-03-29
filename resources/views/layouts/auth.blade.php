<!DOCTYPE html>
<html lang="en" class="h-100">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Disa">

    <title>SIA | {{ $title }}</title>

    @vite('resources/css/app.css')
</head>

<body class="" style="background-color:#295ea0 !important;">
    <div class="container h-100">
        <!-- Outer Row -->
        @yield('content')
    </div>

    @vite('resources/js/app.js')

    @stack('js')
</body>

</html>
