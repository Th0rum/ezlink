<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="/css/app.css">
        <script src="/js/script.js"></script>

    </head>

    <body>

        <div class="container">

            <span class="title" style="color: rgb(254, 138, 24);">EZ LINK</span>
            <span>The easiest URL shortener</span>

            <br>
            <span class="title">How to use</span>
            <span id="ins"></span>
            <span>example:</span>

            <div style="display: flex; flex-wrap: wrap; justify-content: center;">

                <span id="eg" style="color: rgb(0,240,0)"></span>
                <span>https://google.com</span>

            </div>


            <br>
            <span class="title">Custom URL</span>

             <form style="display: flex; flex-direction: column; align-items: center; gap: 10px" action="/customUrl" method="POST">

                <span>Alternatively, you can paste any URL below and specify your own custom URL</span>
                <input name="url" placeholder="Paste URL here"></input>
                <input name="custom" placeholder="Custom URL"></input>
                <button type="submit"> Shorten!</button>

            </form>

        </div>

    </body>

</html>
