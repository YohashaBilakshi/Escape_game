<style>
  @import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");

  * {
    box-sizing: border-box;
  }

  html,
  body {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    font-family: "Permanent Marker", cursive;
  }

  body {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 10px;
    font-family: 'DM Sans', sans-serif;
    transition: background .4s ease-in;
    background-image: url('/assets/img/login-back.png');
    backdrop-filter: blur(10px);
    background-repeat: no-repeat;
    background-size: cover;
    /* Ensures it covers the entire screen */

    /* &.blue {
    background-color: #428aa6;
  } */
  }

  input[type=radio] {
    display: none;
  }

  .card {
    position: absolute;
    width: 60%;
    height: 100%;
    left: 0;
    right: 0;
    margin: auto;
    transition: transform .4s ease;
    cursor: pointer;
  }

  .container {
    width: 100%;
    max-width: 800px;
    max-height: 600px;
    height: 100%;
    transform-style: preserve-3d;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    margin-left: -6%;
  }

  .cards {
    position: relative;
    width: 100%;
    height: 100%;
    margin-bottom: 20px;
  }

  img {
    width: 132%;
    height: 92%;
    border-radius: 10px;
    object-fit: cover;
    margin-left: -14%;
  }

  #item-1:checked~.cards #song-3,
  #item-2:checked~.cards #song-1,
  #item-3:checked~.cards #song-2 {
    transform: translatex(-40%) scale(.8);
    opacity: .4;
    z-index: 0;
  }

  #item-1:checked~.cards #song-2,
  #item-2:checked~.cards #song-3,
  #item-3:checked~.cards #song-1 {
    transform: translatex(40%) scale(.8);
    opacity: .4;
    z-index: 0;
  }

  #item-1:checked~.cards #song-1,
  #item-2:checked~.cards #song-2,
  #item-3:checked~.cards #song-3 {
    transform: translatex(0) scale(1);
    opacity: 1;
    z-index: 1;

    /* img { */
    /* box-shadow: 0px 0px 5px 0px rgba(81, 81, 81, 0.47); */
    /* } */
  }

  .menu-bar {
    margin-left: 10%;
  }

  .player {
    font-family: "Permanent Marker", cursive;

    border-radius: 8px;
    min-width: 320px;
    /* padding: 16px 10px; */
    /* background-color: #f15d29; */
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 18px;
    /* 3D Effect */
    /* box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3),
      inset 0px 4px 6px rgba(255, 255, 255, 0.2); */
  }
  .upper-part {
    position: relative;
    display: flex;
    align-items: center;
    margin-bottom: 12px;
    height: 36px;
    overflow: hidden;
  }

  .play-icon {
    margin-right: 10px;
  }

  .song-info {
    width: calc(100% - 32px);
    display: block;
  }

  .song-info .title {
    /* color: #403d40; */
    font-size: 16px;
    line-height: 24px;
  }

  .sub-line {
    display: flex;
    justify-content: space-between;
    width: 100%;
  }

  .subtitle,
  .time {
    font-size: 12px;
    line-height: 16px;
    color: #c6c5c6;
  }

  .time {
    font-size: 12px;
    line-height: 16px;
    color: #a5a5a5;
    font-weight: 500;
    margin-left: auto;
  }

  .progress-bar {
    height: 3px;
    width: 100%;
    background-color: #e9efff;
    border-radius: 2px;
    overflow: hidden;
  }

  .progress {
    display: block;
    position: relative;
    width: 60%;
    height: 100%;
    background-color: #2992dc;
    border-radius: 6px;
  }

  .info-area {
    width: 100%;
    position: absolute;
    top: 0;
    left: 30px;
    transition: transform .4s ease-in;



  }

  #item-2:checked~.player #test {
    transform: translateY(0);
  }

  #item-2:checked~.player #test {
    transform: translateY(-40px);
  }

  #item-3:checked~.player #test {
    transform: translateY(-80px);
  }

  .menu-bar {
    display: flex;
    flex-direction: column;
  }

  .menu-btn-cls {
    /* display: contents; */
  }

  .menu-btn {
    /* margin: 30px 4px 30px 4px; */
    /* background-image: url(/assets/img/home/button.png); */
    background-size: cover;
    width: 247px;
    height: 111px;
    background-color: transparent;
    border: none;
    display: flex;
    flex-direction: column;
    align-items: stretch;

  }

  .help {
    background-image: url(/assets/img/home/help-btn.png);
    margin-left: 22px;
  }

  .history {
    background-image: url(/assets/img/home/history-btn.png);
    margin-left: 30px;
  }

  .play {
    background-image: url(/assets/img/home/play-btn.png);
    background-repeat: no-repeat;
    background-size: cover;
    width: 400px;
    height: 200px;
    margin-left: -20px;
  }
</style>

<body>
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
        <div class="play-icon">
          <!-- <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
            <defs />
            <path d="M5 3l14 9-14 9V3z" />
          </svg> -->
        </div>
        <div class="info-area" id="test">
          <label class="song-info" id="song-info-1">
            <div class="title">Room</div>
            <div class="sub-line">
              <div class="subtitle">01</div>
              <!-- <div class="time">4.05</div> -->
            </div>
          </label>
          <label class="song-info" id="song-info-2">
            <div class="title">Words Remain</div>
            <div class="sub-line">
              <div class="subtitle">Moderator</div>
              <div class="time">4.05</div>
            </div>
          </label>
          <label class="song-info" id="song-info-3">
            <div class="title">Falling Out</div>
            <div class="sub-line">
              <div class="subtitle">Otzeki</div>
              <div class="time">4.05</div>
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
    <div class="menu-btn-cls"><button class="menu-btn play" onclick="openPopup()"></button></div>
  </div>

  </div>
  </div>
</body>

<script>
  $('input').on('change', function() {
    $('body').toggleClass('blue');
  });

  function openPopup() {
    const width = 1450;
    const height = 800;

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