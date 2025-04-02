$(document).ready(function () {
    let countdown;
    let countdownActive  = false;

    $(document).on("click", function () {
        let audio = $("#my_audio").get(0);
        audio.muted = false;
        audio.play();

        if(!countdownActive ){
            startCountdown(180);
            countdownActive  = true;
        }
    });

});

function startCountdown(duration) {
    let timerDisplay = document.getElementById("timer");
    let timeLeft = duration;

    countdown = setInterval(() => {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        timerDisplay.textContent = `${minutes}:${seconds}`;

        if (timeLeft <= 0) {
            countdownActive = false; 
            clearInterval(countdown);
            timerDisplay.textContent = "Time's up!";
            // alert("Time's up!");
            // window.close();
            // window.location.href = "/dashboard";
        }

        timeLeft--;
    }, 1000);
}

function gamestop() {
    alert("ddddddddddddd");
    clearInterval(countdown);
    // let timerDisplay = document.getElementById("timer");
    const time = $("#timer").text();
    const gameLogedId = $("#game-log-id").val();
    document.getElementById("timer").textContent = "🎉 Contargulations! 🎈";

    $.ajax({
        type: "GET",
        url: `/game-complete/${gameLogedId}/${time}`,
        success: function (response) {},
        error: function (xhr, status, error) {},
    });
}
window.gamestop = gamestop;
