<form method="POST" action="{{ route('logout') }}" x-data>
	@csrf

	<x-dropdown-link href="{{ route('logout') }}"
		@click.prevent="$root.submit();">
		{{ __('Log Out') }}
	</x-dropdown-link>
</form>
<!-- <p id="demo"></p> -->
<div id="timer">3:00</div>
<p id="usename"> {{auth()->user()->name }}</p>
<style>
	#timer {
		font-size: 48px;
		font-weight: bold;
		margin-bottom: 11px;
	}
</style>
<script>

	startCountdown(180);

	function startCountdown(duration) {
		let timerDisplay = document.getElementById('timer');
		let timeLeft = duration;

		let countdown = setInterval(() => {
			let minutes = Math.floor(timeLeft / 60);
			let seconds = timeLeft % 60;
			seconds = seconds < 10 ? '0' + seconds : seconds;

			timerDisplay.textContent = `${minutes}:${seconds}`;

			if (timeLeft <= 0) {
				clearInterval(countdown);
				timerDisplay.textContent = "Time's up!";
				alert("Time's up!");
			}

			timeLeft--;
		}, 1000);
	}
</script>