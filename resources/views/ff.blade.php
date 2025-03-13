
<!-- <link rel="stylesheet" href="{{ asset('assets/css/live_back.css') }}"> -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/live_back.css') }}"> -->
 <style>
    button {
  font-size: 2rem;
  background: none;
  border: none;
  position: relative;
  /* to do, calc arrow-stripes so they repeat nicely on animation loop   */
  --padding-block: 1rem;
  --padding-inline: 2rem;
  --arrow: 5rem;
  --arrow-stripes: .8rem;

  padding: var(--padding-block) var(--padding-inline);
  padding-right: calc(var(--padding-inline) + var(--arrow));
  filter: drop-shadow(4px 4px 4px hsl(0 0% 0% / .5));
  color: white;
  border-radius: 999vmax 0 0 999vmax;
  cursor: pointer;
  transition: all 125ms
}
button:active {
  scale: .975;
}  
button:hover::after{
  animation-play-state: paused;
}
button::after{
  content: "";
  position: absolute;
  inset: 0;
  border-radius: inherit;
  z-index: -1;
  background-color: green;
  background-image: linear-gradient(transparent 50%, hsl(0 0% 0% / .5) 0);
  animation: mask-position 5s linear infinite;
  
  --conic-stops: black 0 90deg, #0000 0;
  --linear-stops: #0000 0px, black 1px var(--arrow-stripes), #0000 calc(var(--arrow-stripes) + 1px) calc(var(--arrow-stripes) * 2);
  --mask-image:
    conic-gradient(from 225deg at right, var(--conic-stops)),
    conic-gradient(from 225deg at right, var(--conic-stops)),
    repeating-linear-gradient(-135deg, var(--linear-stops)),
    repeating-linear-gradient(-45deg, var(--linear-stops));
  --mask-position: 0 0, 0 0, 0 0, 0 100%;
  --mask-position-to: 0, 0, -100% 0 , -100% 100%;
  --mask-size: calc(100% - var(--arrow)) 100%, 100%, 200% 50%, 200% 50%;
  --mask-repeat: no-repeat, repeat, repeat-x, repeat-x;

  -webkit-mask-image: var(--mask-image);
  -webkit-mask-position: var(--mask-position);
  -webkit-mask-size: var(--mask-size);
  -webkit-mask-repeat: var(--mask-repeat);
  -webkit-mask-composite: source-over, source-out, source-over, source-over;

  mask-image: var(--mask-image);
  mask-position: var(--mask-position);
  mask-size: var(--mask-size);
  mask-repeat: var(--mask-repeat);
  mask-composite: add, subtract, add, add;
}

@keyframes mask-position {
  to { 
    -webkit-mask-position: var(--mask-position-to);
    mask-position: var(--mask-position-to);
  }
}

html, body { height: 100%; }
body { margin: 0; display: grid; place-items: center; background-color: hsl(0 0% 85%); }
 </style>
 <button>Some button</button>
 <div class="container">
    <input type="radio" name="slider" id="item-1" checked>
    <input type="radio" name="slider" id="item-2">
    <input type="radio" name="slider" id="item-3">
  <div class="cards">
    <label class="card" for="item-1" id="song-1">
      <img src="https://images.unsplash.com/photo-1530651788726-1dbf58eeef1f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=882&q=80" alt="song">
    </label>
    <label class="card" for="item-2" id="song-2">
      <img src="https://images.unsplash.com/photo-1559386484-97dfc0e15539?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1234&q=80" alt="song">
    </label>
    <label class="card" for="item-3" id="song-3">
      <img src="https://images.unsplash.com/photo-1533461502717-83546f485d24?ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="song">
    </label>
  </div>
  <div class="player">
    <div class="upper-part">
      <div class="play-icon">
        <svg width="20" height="20" fill="#2992dc" stroke="#2992dc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-play" viewBox="0 0 24 24">
          <defs/>
          <path d="M5 3l14 9-14 9V3z"/>
        </svg>
      </div>
      <div class="info-area" id="test">
        <label class="song-info" id="song-info-1">
          <div class="title">Bunker</div>
          <div class="sub-line">
            <div class="subtitle">Balthazar</div>
            <div class="time">4.05</div>
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