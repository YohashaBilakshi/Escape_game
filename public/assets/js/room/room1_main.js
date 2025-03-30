$(document).ready(function () {
    let canvasElement = document.querySelector(".banana-canvas");
    let loaderElement = document.querySelector(".loader");
    let notificationBar = document.getElementById("notification-bar");

    let answer = -1;

    loaderElement.style.display = "none";

    document
        .getElementById("puzzel-popup")
        .addEventListener("click", function (event) {
            event.stopPropagation();
        });

    $(document).on("click", ".showEnvelope", function (e) {
        showPopup();
        setTimeout(function () {
            $(".popup").fadeOut();
        }, 4000);
    });

    $(document).on("click", ".showLaptop", function (e) {
        document.getElementById("banana-canvas").style.display = "block";
    });

    $(document).on("click", ".showPasscode", function (e) {
        document.getElementById("passcode-view").style.display = "block";
    });

    // REFER SOURCE : chat.openai.com  popup views  -->

    document.body.addEventListener("click", function (event) {
        let popup = document.getElementById("puzzel-popup");
        let bananaCanvas = document.getElementById("banana-canvas");
        let paper = document.querySelector(".showEnvelope");
        let keyboardBox = document.getElementById("key-board");
        let passcodeview = document.getElementById("passcode-view");

        if (
            event.target !== popup.querySelector("img") &&
            event.target !== paper &&
            event.target !== passcodeview &&
            event.target !== bananaCanvas.querySelector(".lap-main-cress") &&
            !keyboardBox.contains(event.target) &&
            !passcodeview.contains(event.target)
        ) {
            hidePopup();
        }
    });

    const keys = document.querySelectorAll(".key");
    const inputs = document.querySelectorAll(".lap-screen input");

    // REFER SOURCE : chat.openai.com  Check if all inputs are filled  -->

    let currentIndex = 0;

    keys.forEach((key) => {
        key.addEventListener("click", function () {
            let keyValue = this.textContent.toUpperCase();
            if (currentIndex >= inputs.length) return;

            inputs[currentIndex].value = keyValue;
            currentIndex++;

            if (currentIndex === inputs.length) {
                setTimeout(() => {
                    checkPassword();
                }, 800);
            }
        });
    });

    function checkPassword() {

        let enteredPassword = Array.from(inputs)
            .map((input) => input.value)
            .join("");

        if (enteredPassword === "TAKI") {
            const inputs = document.querySelectorAll("input");
            inputs.forEach((input) => (input.style.display = "none"));
            document.getElementById("key-board").style.display = "none";
            let lapsSreen = document.querySelector(".lap-screen");

            $.ajax({
                type: "GET",
                url: "/puzzel",
                beforeSend: function () {
                    loaderElement.style.display = "block";
                    document
                        .querySelectorAll("#digit-a, #digit-b, #digit-c")
                        .forEach((el) => (el.style.display = "block"));
                    lapsSreen.style.top = "35%";
                    // document.getElementById("lock-display").style.display = "block";
                },
                success: function (response) {
                    let base64String = response.question;
                    answer = response.solution;
                    console.log("solution key:", answer);
                    imagePuzzle = "data:image/png;base64," + base64String;
                    lapsSreen.style.top = "30%";
                    loaderElement.style.display = "none";

                    const lapScreen = document.querySelector(".lap-screen");
                    lapScreen.style.backgroundImage =
                        'url("data:image/png;base64,' + base64String + '")';
                    lapScreen.style.backgroundSize = "contain";
                    lapScreen.style.backgroundPosition = "center";
                    lapScreen.style.backgroundRepeat = "no-repeat";
                },
                error: function (xhr, status, error) {
                    toastr.error('@lang("messages.something_went_wrong")');
                },
            });

            // Hide the inputs
        } else {
            notificationBar.style.top = "10px";
            clearInputs();
        }
        setTimeout(() => {
            notificationBar.style.top = "-50px";
        }, 2000);
    }

    function clearInputs() {
        inputs.forEach((input) => (input.value = ""));
        currentIndex = 0;
    }

    $(document).on("click", ".unlock-btn", function (e) {
        let code =
            document.getElementById("digit-a").value +
            document.getElementById("digit-b").value +
            document.getElementById("digit-c").value;

        let pass = 27;
        pass = `${pass}${answer}`;
        let finalPass = Number(pass);

        if (code == finalPass) {

            const imagePath = "assets/img/rooms/room1/room_1_open.png";
            const lapScreen = document.querySelector(".game-image");
            lapScreen.src = imagePath;
            const passcode = document.querySelector(".passcode-view");
            const spark = document.querySelector(".sparckls");
            spark.style.display = "inline-block";
            passcode.style.display = "none";

            let backgroundAudio = document.getElementById("my_audio");
            if (backgroundAudio) {
                backgroundAudio.pause();
                backgroundAudio.currentTime = 0; // Reset audio to start
            }
            // let sparksAudio = new Audio("/assets/sounds/sparks.mp3");
            sparksAudio.play();
            spark.style.display = "inline-block";
            passcode.style.display = "none";
        }
    });
});

function showPopup() {
    document.getElementById("puzzel-popup").style.display = "block";
}
function showLaptop() {
    document.getElementById("banana-canvas").style.display = "block";
}
function hidePopup() {
    document.getElementById("puzzel-popup").style.display = "none";
    document.getElementById("banana-canvas").style.display = "none";
    document.getElementById("passcode-view").style.display = "none";
    // document.getElementById("lock-display").style.display = "block";
}

function hideCanvas(event) {
    let canvasElement = document.querySelector(".banana-canvas");
    if (!canvasElement.contains(event.target)) {
        canvasElement.style.display = "none";
    }
}
function moveNext(current, nextId) {
    if (current.value.length === 1 && nextId) {
        document.getElementById(nextId).focus();
    }
}
