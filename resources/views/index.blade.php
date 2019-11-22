<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>EhackB v7</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/homepage.css">
    </head>
    <body>
        <div class="mainMenu">
            <ul class="menuItems" id="mainItems">
                <li class="playButton">Play</li>
                <li><a href="{{ route('games.index') }}">Competitions</a></li>
                <li><a href="{{ route('talks.index') }}">Talks</a></li>
                <li><a href="">Location</a></li>
                <li><a href="{{ route('sponsors.index') }}">Sponsors</a></li>
                <li><a href="{{ route('about') }}">Credits</a></li>
                <li><a href="https://www.google.be">Save & Exit</a></li>
            </ul>
            <ul class="menuItems" id="playItems">
                <li><a href="{{ route('login') }}">Continue</a></li>
                <li id="newGameButton">New Game</li>
                <li class="mainMenuButton">Back</li>
            </ul>
            <ul class="menuItems" id="newGameItems">
                <li><a href="{{ route('register') }}">1 player</a></li>
                <li><a href="">2 players</a></li>
                <li><a href="">3 players</a></li>
                <li><a href="">4 players</a></li>
                <li><a href="">5 players</a></li>
                <li><a href="">more players</a></li>
                <li class="playButton">Back</li>
            </ul>
        </div>

        <script src="js/homepage.js"></script>
    </body>
</html>