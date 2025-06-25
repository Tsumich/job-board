<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="resources/css/app.css" rel="stylesheet">
       @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <title>Laravel Job Board</title>
    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-gradient-to-r from-blue-400 via-purple-400
               to-pink-200 text-slate-700">
        {{ $slot }}
    </body>
</html>
