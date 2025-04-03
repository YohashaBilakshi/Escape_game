<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

<body>
  <audio id="my_audio" src="assets/sounds/game_background.mp3" loop muted></audio>
  <input type="hidden" class="game_level" value="{{ $user_level }}">

  <!-- REFER SOURCE : freefrontend.com  carousels -->

  <div class="container">
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
    <div class="cards">
      <label class="card" for="item-1" id="song-1">
        <img src="/assets/img/home/room_1_open.png" alt="song">
      </label>
      <label class="card" for="item-2" id="song-2">
        <img src="/assets/img/home/{{ $user_level >= 2 ? 'room_2_open' : 'room_2_h' }}.png" alt="song">
      </label>
      <label class="card" for="item-3" id="song-3">
        <img src="/assets/img/home/{{ $user_level >= 3 ? 'room_3_open' : 'room_3_h' }}.png" alt="song">
      </label>
    </div>
    <div class="player">
      <div class="upper-part">
        <div class="info-area" id="test">
          @foreach ( $game_list as $games)
          <label class="song-info" id="song-info-{{ $games->id }}">
            <div class="title">{{$games->name}}</div>
            <div class="sub-line">
              <div class="subtitle">{{$games->description}}</div>
              <div class="time"> {{$games->id}}</div>
            </div>
          </label>
          @endforeach
        </div>
      </div>
      <div class="progress-bar">
        <span class="progress"></span>
      </div>
    </div>
  </div>
  <div class="menu-bar">
    <div class="menu-btn-cls"><button class="menu-btn help"></button></div>
    <div class="menu-btn-cls"><button class="menu-btn history"></button></div>
    <a href="/user/profile">
      <div class="menu-btn-cls"><button class="menu-btn leave"> </button>
      </div>
    </a>
    <div class="menu-btn-cls"><button class="menu-btn play" onclick="openPopup()"></button></div>
  </div>
  <div class="popup-overlay" id="gameInfoPopup">
    <div class="popup-content"></div>
  </div>
  <div class="popup-overlay" id="gameHistoryPopup">
    <div class="popup-content-history">
      @include('history')
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".menu-btn.help").click(function() {
        $("#gameInfoPopup").fadeIn();
      });

      $("#gameInfoPopup").click(function(event) {
        if (!$(event.target).closest(".popup-content").length) {
          $("#gameInfoPopup").fadeOut();
        }
      });

      $(".menu-btn.history").click(function() {
        $("#gameHistoryPopup").fadeIn();
      });

      $("#gameHistoryPopup").click(function(event) {
        if (!$(event.target).closest(".popup-content-history").length) {
          $("#gameHistoryPopup").fadeOut();
        }
      });


      $('input').on('change', function() {
        $('body').toggleClass('blue');
      });

    });

    function openPopup() {

      let checkedRadio = document.querySelector('input[name="slider"]:checked');
      const gameLevel = document.querySelector('.game_level').value;
      let id = 1;

      if (checkedRadio) {
        checkedRadioValue = checkedRadio.id;
        if (((checkedRadioValue === "item-3" && gameLevel > 2) || (checkedRadioValue === "item-2" && gameLevel > 1) || (checkedRadioValue === "item-1"))) {
          id = checkedRadioValue === "item-3" ? 3 : checkedRadioValue === "item-2" ? 2 : 1;

          const width = 1450;
          const height = 750;

          const popup = window.open(`/escape-game/${id}`, "PopupWindow",
            `width=${width},height=${height},scrollbars=no,resizable=no,menubar=no,toolbar=no,status=no`
          );

          if (popup) {
            const interval = setInterval(() => {
              if (popup.outerWidth !== width || popup.outerHeight !== height) {
                popup.resizeTo(width, height);
              }
            }, 100);
            popup.onbeforeunload = () => clearInterval(interval);
          }
        }
      }
    }
  </script>
</body>