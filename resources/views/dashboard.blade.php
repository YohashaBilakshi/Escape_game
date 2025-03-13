<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<style>
  .popup-overlay {
    position: fixed;
    top: 0; /* Cover the full screen */
    left: 0;
    width: 100%;
    height: 100%;
    display: none;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.7); 
  }

  .popup-content {
    position: relative;
    background-image: url(/assets/img/home/game-info.png);
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    width: 600px;
    height: 500px;
    left: 32%;
    top: 11%;
}
  .close-btn {
    background: red;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    margin-top: 10px;
  }
</style>

<body>
  <audio id="my_audio" src="assets/sounds/game_background.mp3" loop muted></audio>

  <div class="container">
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
    <div class="cards">
      <label class="card" for="item-1" id="song-1">
        <img src="/assets/img/home/room_1_h3.png" alt="song">
      </label>
      <label class="card" for="item-2" id="song-2">
        <img src="/assets/img/home/room_1_h3.png" alt="song">
      </label>
      <label class="card" for="item-3" id="song-3">
        <img src="/assets/img/home/room_1_h3.png" alt="song">
      </label>
    </div>
    <div class="player">
      <div class="upper-part">
        <div class="info-area" id="test">
          <label class="song-info" id="song-info-1">
            <div class="title">ROOM 01</div>
            <div class="sub-line">
              <div class="subtitle">GAME LEVEL</div>
              <div class="time"> 01 </div>
            </div>
          </label>
          <label class="song-info" id="song-info-2">
            <div class="title">ROOM 02</div>
            <div class="sub-line">
              <div class="subtitle">GAME LEVEL</div>
              <div class="time"> 02 </div>
            </div>
          </label>
          <label class="song-info" id="song-info-3">
            <div class="title">ROOM 03</div>
            <div class="sub-line">
              <div class="subtitle">GAME LEVEL</div>
              <div class="time"> 03 </div>
            </div>
          </label>
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
    <div class="menu-btn-cls"><button class="menu-btn leave"></button></div>
    <div class="menu-btn-cls"><button class="menu-btn play" onclick="openPopup()"></button></div>
  </div>
  <div class="popup-overlay" id="gameInfoPopup">
    <div class="popup-content"></div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $('input').on('change', function() {
      $('body').toggleClass('blue');
    });

    // const historyBtn = document.querySelector('.menu-btn.history');
    // const popupOverlay = document.getElementById('gameInfoPopup');

    $(document).ready(function () {
        $(".menu-btn.help").click(function () {
            $("#gameInfoPopup").fadeIn();
        });

        // Close when clicking outside the popup-content
        $("#gameInfoPopup").click(function (event) {
            if (!$(event.target).closest(".popup-content").length) {
                $("#gameInfoPopup").fadeOut();
            }
        });
    });

    // $(document).on("click", function () {
    //     let audio = $("#my_audio").get(0);
    //     audio.muted = false;
    //     audio.play();
    // });
    function openPopup() {
      const width = 1450;
      const height = 750;

      const popup = window.open(
        "{{ route('showGameRoom') }}",
        "PopupWindow",
        `width=${width},height=${height},scrollbars=no,resizable=no,menubar=no,toolbar=no,status=no`
      );

      if (popup) {
        // Keep enforcing the size but allow movement
        const interval = setInterval(() => {
          if (popup.outerWidth !== width || popup.outerHeight !== height) {
            popup.resizeTo(width, height);
          }
        }, 100); // Check every 100ms

        // Stop interval when popup is closed
        popup.onbeforeunload = () => clearInterval(interval);
      } else {
        alert("Popup was blocked! Allow popups for this site.");
      }
    }
  </script>
</body>