<!doctype html>
<html data-theme="dracula" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tuulik</title>
    @vite('resources/css/app.css')

    <style>
        body{
            background-color: #EF7933;
        }
    </style>
</head>
<body>
@include('partials.nav')
@yield('content')
</body>
</html>
