<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Game</title>
    <link rel="stylesheet" href="{{ asset('assets/css/room/room2_main.css') }}">
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
            <img class="game-image" src="assets/img/rooms/room2/room_2.png" alt="Room Image">
            <img class="sparckls" style="position: absolute; transform: translate(-50%, -50%); width: 34%; /* height: auto; */ pointer-events: none; margin-left: 33%; margin-top: -44%; display: none" src="assets/img/rooms/room1/clip-sparkling.gif" alt="">
          
        </div>

            <div class="showColorPalate"></div>
            <div class="showPasscode"></div>
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


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/room/room2_main.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>