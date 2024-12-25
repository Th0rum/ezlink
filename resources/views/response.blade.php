<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="/css/app.css">

    </head>

    <body>

        <div class="center" style="flex-direction: column">

            <span>Shortened URL</span>
            <span class="title"> {{$shortUrl}} </span>

        </div>

    </body>

</html>
