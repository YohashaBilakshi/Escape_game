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
        <img class="game-image" src="assets/img/rooms/room1/room_1.png" alt="Room Image">
        <div class="showEnvelope"></div>
        <div class="showLaptop"></div>
        <div class="showPasscode"></div>
    </div>

    <div id="passcode-view" class="passcode-view">
        <div class="lock-display">
            <input type="text" class="digit-input" maxlength="1" id="digit-1" oninput="moveNext(this, 'digit-2')" />
            <input type="text" class="digit-input" maxlength="1" id="digit-2" oninput="moveNext(this, 'digit-3')" />
            <input type="text" class="digit-input" maxlength="1" id="digit-3" oninput="moveNext(this, null)" />
        </div>
        <button class="unlock-btn" onclick="submitCode()">🔓 Unlock</button>
    </div>
    <div id="banana-canvas" class="banana-canvas">


        <div class="loader"></div>


        <!-- The laptop image -->
        <div class="lap-main-cress">
            <img id="base64Image" src="assets/img/rooms/room1/laptop.png" alt="Decoded Image">

            <!-- Laptop screen overlay (password inputs) -->
            <div class="lap-screen">
                <input type="text" maxlength="1" id="digit-1" oninput="moveNext(this, 'digit-2')">
                <input type="text" maxlength="1" id="digit-2" oninput="moveNext(this, 'digit-3')">
                <input type="text" maxlength="1" id="digit-3" oninput="moveNext(this, 'digit-4')">
                <input type="text" maxlength="1" id="digit-4">
            </div>
        </div>

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
    <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
        <p id="demo"></p>
        <div class="loader-timer"></div>
        <p id="score"> High Score : 1m 30s</p>
        <p id="usename"> Yohasha </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/room/room1_main.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>