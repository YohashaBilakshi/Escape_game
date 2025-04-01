<button onclick="window.location.href='{{ route('dashboard') }}'"> Leave Game </button>

<!-- <p id="demo"></p> -->
<div id="timer">1:00</div>
<p id="usename"> {{auth()->user()->name }}</p>
<style>
	#timer {
		font-size: 40px;
		font-weight: bold;
		margin-bottom: 11px;
	}
</style>
<script>

	
</script>