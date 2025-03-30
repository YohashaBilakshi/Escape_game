<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Game</title>
    <link rel="stylesheet" href="{{ asset('assets/css/room/room1_main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/background.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="game-body">

    @include('layouts.game_background')

    <div class="game-container-main" style="width: 1100px; margin-top: 3%;">

        <audio id="my_audio" src="assets/sounds/game_background.mp3" loop muted></audio>

        <div id="notification-bar" class="notification-bar"> <i class="fa-solid fa-rotate-right"></i> Try Again!</div>

        <div class="game-container">
            <img class="game-image" src="assets/img/rooms/room1/room_1.png" alt="Room Image">
            <img class="sparckls" style=" transform: translate(-50%, -50%); width: 34%; /* height: auto; */ pointer-events: none; margin-left: 33%; margin-top: -44%; display: none" src="assets/img/rooms/room1/clip-sparkling.gif" alt="">
            <div class="showEnvelope"></div>  <!-- Clickable area for the clue 1 -->
            <div class="showLaptop"></div>    <!-- Clickable area for the clue 2 -->
            <div class="showPasscode"></div>  <!-- Clickable area door lock -->
        </div>

        <!-- passcode -->
        <div id="passcode-view" class="passcode-view">
            <div class="lock-display" id="lock-display">
                <input type="number" class="digit-input" maxlength="1" id="digit-a" min="0" placeholder="🍏" oninput="moveNext(this, 'digit-2')" />
                <input type="number" class="digit-input" maxlength="1" id="digit-b" min="0" placeholder="🍓" oninput="moveNext(this, 'digit-3')" />
                <input type="number" class="digit-input" maxlength="1" id="digit-c" min="0" placeholder="🍌" oninput="moveNext(this, null)" />
            </div>
            <button class="unlock-btn"> 🔒Enter</button>
        </div>

        <!-- banana API image clue 2 -->
        <div id="banana-canvas" class="banana-canvas">
            <!-- RIFER SOURCE : https://css-loaders.com/  loader-->
            <div class="loader"></div>
            <div class="lap-main-cress">
                <img id="base64Image" src="assets/img/rooms/room1/laptop.png" alt="Decoded Image">
                <div class="lap-screen">
                    <input type="text" maxlength="1" id="digit-1" oninput="moveNext(this, 'digit-2')">
                    <input type="text" maxlength="1" id="digit-2" oninput="moveNext(this, 'digit-3')">
                    <input type="text" maxlength="1" id="digit-3" oninput="moveNext(this, 'digit-4')">
                    <input type="text" maxlength="1" id="digit-4">
                </div>
            </div>

             <!-- REFER SOURCE : reefrontend.com  keyboard designs  -->
            <div class="key-board" id="key-board">
                @include('keyboard')
            </div>
        </div>

        <div id="taki-overlay" class="taki-overlay">
            <span class="taki-text">TAKI</span>
        </div>

        <div class="popup puzzel-popup" id="puzzel-popup">
            <img id="" class="" src="assets/img/rooms/room1/password_envelop.gif" alt="Password">
        </div>

        <div class="bottom-bar">
            @include('layouts.footer')
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/room/room1_main.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>