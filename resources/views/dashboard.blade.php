<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Escape Game</title>
        <link rel="stylesheet" href="{{ asset('assets/css/room/room1_main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>

        </style>
    </head>

    <body>
    <audio id="my_audio" src="assets/sounds/game_background.mp3" loop muted></audio>

         <div id="notification-bar" class="notification-bar"> <i class="fa-solid fa-rotate-right"></i> Try Again!</div>
    
        <div class="game-container">
            <img class="game-image" src="assets/img/rooms/room1/room.png" alt="Room Image">
            <div class="showEnvelope"></div>
            <!-- <div class="showLaptop"></div> -->
        </div>

        <div id="banana-canvas" class="banana-canvas">
            <div class="loader"></div>
            <img id="base64Image" src="" alt="Decoded Image">
            <div class="key-board" id="key-board" >
             @include('keyboard') 
            </div>
        </div>

        <div id="taki-overlay" class="taki-overlay">
            <span class="taki-text">TAKI</span>
        </div>

        <div class="popup puzzel-popup" id="puzzel-popup">
            <img id="puzzel" class="puzzel" src="assets/img/rooms/room1/paper.png" alt="Password">
        </div>

        <div class="bottom-bar">
        <p id="demo"></p>
        <div class="loader-timer"></div>
        <p id="score"> High Score :  1m 30s</p>
        <p id="usename"> Yohasha </p>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/room/room1_main.js') }}"></script>
        <script src="{{ asset('assets/js/common.js') }}"></script>

    </body>

</html>
