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
@import url('https://fonts.googleapis.com/css?family=Exo:400,700');

* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

.game-body {
    /* font-family: 'Exo', sans-serif; */
    overflow: hidden;
    background-image: url('/assets/img/login-back.png');
    background-size: cover; /* Ensures it covers the entire screen */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat;

	backdrop-filter: blur(10px);
}

.context {
    width: 100%;
    position: absolute;
    top: 50vh;
    text-align: center;
    color: #fff;
}

.context h1 {
    font-size: 50px;
}

.area {
    /* background: #4e54c8; */
    background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
    width: 100%;
    height: 100vh;
    overflow: hidden;
    /* position: relative; */
}
.lenses {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.lens {
    position: absolute;
    opacity: 0.8;
    animation: float 15s linear infinite;
}

/* More lenses with higher concentration to the left & right */
.lens1 { left: 3%; width: 60px; animation-duration: 18s; animation-delay: 1s; }
.lens2 { left: 7%; width: 100px; animation-duration: 22s; animation-delay: 3s; }
.lens3 { left: 12%; width: 90px; animation-duration: 19s; animation-delay: 5s; }
.lens4 { left: 18%; width: 110px; animation-duration: 23s; animation-delay: 2s; }
.lens5 { left: 25%; width: 80px; animation-duration: 20s; animation-delay: 4s; }
.lens6 { left: 30%; width: 150px; animation-duration: 21s; animation-delay: 6s; }
.lens7 { left: 35%; width: 75px; animation-duration: 24s; animation-delay: 2s; }
.lens8 { left: 45%; width: 130px; animation-duration: 26s; animation-delay: 3s; }
.lens9 { left: 55%; width: 90px; animation-duration: 22s; animation-delay: 4s; }
.lens10 { left: 65%; width: 100px; animation-duration: 25s; animation-delay: 1s; }
.lens11 { left: 72%; width: 85px; animation-duration: 17s; animation-delay: 5s; }
.lens12 { left: 80%; width: 120px; animation-duration: 28s; animation-delay: 3s; }
.lens13 { left: 85%; width: 95px; animation-duration: 18s; animation-delay: 6s; }
.lens14 { left: 90%; width: 110px; animation-duration: 21s; animation-delay: 4s; }
.lens15 { left: 96%; width: 100px; animation-duration: 19s; animation-delay: 2s; }

/* Floating animation */
@keyframes float {
    0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
    100% {
        transform: translateY(-10vh) rotate(360deg);
        opacity: 0;
    }
}

</style>
</head>

<body class="game-body">

<div class="area">
    <div class="lenses">
        <!-- More lenses, distributed more to left and right -->
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens1" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens2" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens3" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens4" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens5" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens6" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens7" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens8" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens9" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens10" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens11" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens12" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens13" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens14" alt="Hand Lens">
        <img src="{{ asset('assets/img/hand_lens.png') }}" class="lens lens15" alt="Hand Lens">
    </div>
</div>


    <div class="game-container-main" style="    width: 1100px; margin-top: 3%;">


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

        
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/room/room1_main.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>