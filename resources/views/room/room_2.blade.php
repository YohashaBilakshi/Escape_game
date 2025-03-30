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
        <div id="overlay" class="overlay"></div>
        <div class="game-container">
            <img class="game-image" src="assets/img/rooms/room2/room_2.png" alt="Room Image">

            <!-- Clickable area for the clue -->
            <div class="clue-area " id="clue1">
                <!-- Clue popup with input for Clue 1 -->
                <div class="loader"></div>
                <div id="clue-popup" class="clue-popup">
                    <div class="clue-submit">
                        <input type="text" class="digit-input" />
                    </div>
                </div>

            </div>
            <div class="clue-area-door" id="clue2">
                <div class="clue-door">
                    <div class="clue-submit-door" style="display: none;">
                        <div class="clue-submit-door-box">
                            <input type="number" id="clue-input-door-1" min="1" max="9" placeholder="" maxlength="1">
                            <input type="number" id="clue-input-door-2" min="1" max="9" placeholder="" maxlength="1">
                            <input type="number" id="clue-input-door-3" min="1" max="9" placeholder="" maxlength="1">
                            <input type="number" id="clue-input-door-4" min="1" max="9" placeholder="" maxlength="1">
                        </div>
                        <!-- <button id="clue-submit-door">Submit</button>
                        <button id="clue-close-door">Close</button> -->
                    </div>
                </div>
            </div>

            <div class="clue-area-wall" id="clue-3">
                <div class="box-group" style="display: none">
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>
                    <div class="box"></div>              
                    <div class="color-answer" hidden></div>      
                    <p style="color: white; font-size: smaller; width: 200px;"> Hint : Color count decending order</p>        
                </div>
            </div>
        </div>
    </div>

    <!-- Clue popup -->
    <div id="clue-popup" class="clue-popup">
        <p id="clue-text"></p>
        <button onclick="closeClue()">Close</button>
    </div>


    </div>
    <!-- chs -->
    <div class="bottom-bar">
        @include('layouts.footer')
    </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/room/room2_main.js') }}"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>