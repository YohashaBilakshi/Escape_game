<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Escape Game</title>
        <link rel="stylesheet" href="{{ asset('assets/css/room/room1_main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">

        <style>

        </style>
    </head>

    <body>

        <div class="game-container">
            <button class="close-btn" onclick="hideCanvas()">Close</button>
            <img class="game-image" src="assets/img/rooms/room1/room.png" alt="Room Image">
            <div class="showEnvelope"></div>
        </div>

        <div id="banana-canvas" class="banana-canvas">
            <div class="loader"></div>
            <div class="key-board" id="key-board" >
            <img id="base64Image" src="" alt="Decoded Image">
             @include('keyboard') 
            </div>
        </div>

        <div class="popup" id="popup">
            <img id="puzzel" class="puzzel" src="assets/img/rooms/room1/paper.png" alt="Password">
        </div>

        <div class="bottom-bar">

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/room/room1_main.js') }}"></script>

    </body>

</html>
