<button class="leave-btn" onclick="window.location.href='{{ route('dashboard') }}'"> Leave Game </button>

<!-- <p id="demo"></p> -->
<div id="timer">3:00</div>
<p id="usename"> {{auth()->user()->name }}</p>
<style>
	#timer {
		font-size: 40px;
		font-weight: bold;
		margin-bottom: 11px;
	}
	/* REFER SOURCE : https://codepen.io/  leave btn styles */
	.leave-btn {
		font-size: 15px;
		background: none;
		border: none;
		position: relative;
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
		transition: all 125ms;
		width: 243px;
		height: 11px;
		border-bottom: 16px;
		text-align: center;
		padding-bottom: 5px;
	}

	.leave-btn:active {
		scale: .975;
	}

	.leave-btn:hover::after {
		animation-play-state: paused;
	}

	.leave-btn::after {
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
		--mask-position-to: 0, 0, -100% 0, -100% 100%;
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
</style>