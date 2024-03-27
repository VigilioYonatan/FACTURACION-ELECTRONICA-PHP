<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(["resources/ts/main.ts","resources/css/main.css"])
    </head>
    <body class="antialiased">
       <h1>Hola mundo</h1>
       <counter></counter>
    </body>
</html>
