<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Game</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/room/room3_main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/background.css') }}">
</head>

<body class="game-body">

    @include('layouts.game_background')

    <div class="game-container-main" style="width: 1100px; margin-top: 3%;">

        <audio id="my_audio" src="{{ asset('/sounds/game_background.mp3') }}" loop muted></audio>
        <input type="hidden" id="game-log-id" value="{{$gsmeLogId}}">

        <div id="notification-bar" class="notification-bar"> <i class="fa-solid fa-rotate-right"></i> Try Again!</div>
        <div id="overlay" class="overlay"></div>
        <div class="game-container">
            <img class="game-image close-room" src="{{ asset('assets/img/rooms/room3/room_3.png') }}" alt="Room Image">
            <img class="game-image open-room" src="{{ asset('assets/img/rooms/room3/room_3_open.png') }}" alt="Room Image">
            <div>
                <img class="sparckls" style="transform: translate(-50%, -18%); width: 34%; /* height: auto; */ pointer-events: none; margin-left: 58%; margin-top: -56%; display: none;" src="{{ asset('assets/img/rooms/room1/clip-sparkling.gif') }}" alt="">
            </div>
            <div class="clue-area" id="clue1">
                <img class="banana-canvas" src="{{ asset('assets/img/rooms/room3/banana.png') }}" alt="Room Image">
            </div>
            <div class="clue-area-pass" id="clue2">
                <div class="clue-pass">
                    <div class="clue-submit-pass" style="display: none;">
                        <div class="clue-submit-pass-box">
                            <div class="row-pass">
                                <input id="passInput" type="text" disabled />
                                <div>
                                    <div class="row-pass">
                                        <button class="btn" data-number="1"></button>
                                        <button class="btn" data-number="2"></button>
                                        <button class="btn" data-number="3"></button>
                                    </div>
                                    <div class="row-pass">
                                        <button class="btn" data-number="4"></button>
                                        <button class="btn" data-number="5"></button>
                                        <button class="btn" data-number="6"></button>
                                    </div>
                                    <div class="row-pass">
                                        <button class="btn" data-number="7"></button>
                                        <button class="btn" data-number="8"></button>
                                        <button class="btn" data-number="9"></button>
                                    </div>
                                    <div class="row-pass">
                                        <button class="btn" data-number=""></button>
                                        <button class="btn" data-number="0"></button>
                                        <button class="btn" data-number="clear"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clue-area-wall" id="clue-3">
                <div class="box-group" style="display: none;">
                    <div class="row-color">
                        <div class="box"><span class="box1"></span></div>
                        <div class="box"></div>
                        <div class="box"></div>
                    </div>
                    <div class="row-color">
                        <div class="box"></div>
                        <div class="box"></div>
                        <div class="box"><span class="box2"></span></div>
                    </div>
                    <div class="row-color">
                        <div class="box"></div>
                        <div class="box"><span class="box3"></span></div>
                        <div class="box"></div>
                    </div>
                </div>
            </div>

            <div class="clue-area-book" id="clue4">
                <div class="clue-book" style="display: none;">
                    <img class="clue-book" src="{{ asset('assets/img/rooms/room3/book.png') }}" alt="Room Image">
                </div>
            </div>

            <div class="clue-area-lap" id="clue5">
                <div class="lap-screen" style="display: none;">
                    <input type="text" id="password" style="width: 140px;" placeholder="PASSWORD">
                    <button class="unlock-btn" id="unlock-btn" onclick="unclock()">🔒Enter</button>
                    <button class="unlock-btn" id="unlock-btn2" style="display: none;" onclick="unclock2()">go</button>
                </div>
                <img class="lap-sol" id="lap-sol" src="{{ asset('assets/img/rooms/room3/bar_solution.png') }}" alt="">
            </div>

            <div id="clue-popup" class="clue-popup">
                <p id="clue-text"></p>
                <button onclick="closeClue()">Close</button>
            </div>


        </div>

        <div class="bottom-bar">
            @include('layouts.footer')
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script src="{{ asset('assets/js/room/room3_main.js') }}"></script>

</body>

</html>