$(document).ready(function () {
    let canvasElement = document.querySelector(".banana-canvas");
    let loaderElement = document.querySelector(".loader");
    let notificationBar = document.getElementById("notification-bar");

    let answer = null;

    loaderElement.style.display = "none";

    document
        .getElementById("puzzel-popup")
        .addEventListener("click", function (event) {
            event.stopPropagation();
        });

    $(document).on("click", ".showEnvelope", function (e) {
        showPopup();
        setTimeout(function () {
            $(".popup").fadeOut(); // Hide the popup smoothly
        }, 4000);
    });

    $(document).on("click", ".showLaptop", function (e) {
        document.getElementById("banana-canvas").style.display = "block";
        // showPopup();
        // setTimeout(function () {
        //     $(".popup").fadeOut(); // Hide the popup smoothly
        // }, 4000);
    });

    $(document).on("click", ".showPasscode", function (e) {
        document.getElementById("passcode-view").style.display = "block";
        // showPopup();
        // setTimeout(function () {
        //     $(".popup").fadeOut(); // Hide the popup smoothly
        // }, 4000);
    });
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

    let currentIndex = 0; // Track which input box is being filled

    keys.forEach((key) => {
        key.addEventListener("click", function () {
            let keyValue = this.textContent.toUpperCase(); // Ensure uppercase

            // If all inputs are filled, do nothing
            if (currentIndex >= inputs.length) return;

            // Fill the first empty input
            inputs[currentIndex].value = keyValue;
            currentIndex++;

            // Check if all inputs are filled
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
            // Set the background image of .lap-screen and adjust its size

            // let imageElement = document.getElementById("base64Image");
            // let keyboard = document.querySelector(".key-board");
            const inputs = document.querySelectorAll("input");
            inputs.forEach((input) => (input.style.display = "none"));
            document.getElementById("key-board").style.display = "none";
            let lapsSreen = document.querySelector(".lap-screen");

            $.ajax({
                type: "GET",
                url: "/puzzel",
                beforeSend: function () {
                    // canvasElement.style.display = "flex";

                    loaderElement.style.display = "block";
                    lapsSreen.style.top = "40%";
                    // keyboard.style.display = "none";
                },
                success: function (response) {
                    let base64String = response.question;
                    answer = response.solution;
                    console.log("solution key:", answer);
                    imagePuzzle = "data:image/png;base64," + base64String;
                    lapsSreen.style.top = "34%";

                    console.log(base64String);
                    // document.querySelector(".loader").style.display = "none";
                    // document.querySelector(".lap-screen")./

                    loaderElement.style.display = "none";
                    // imageElement.style.display = "block";
                    // keyboard.style.display = "block";

                    const lapScreen = document.querySelector(".lap-screen");
                    lapScreen.style.backgroundImage =
                        'url("data:image/png;base64,' + base64String + '")';
                    lapScreen.style.backgroundSize = "contain"; // This will make sure the entire image is visible within the box
                    lapScreen.style.backgroundPosition = "center"; // Centers the image
                    lapScreen.style.backgroundRepeat = "no-repeat"; // Prevents repeating the image if the box is larger than the image
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

function submitCode() {
    let code =
        document.getElementById("digit-1").value +
        document.getElementById("digit-2").value +
        document.getElementById("digit-3").value;

    const imagePath = "assets/img/rooms/room1/room_1_open.png";

    // Change the image source
    const lapScreen = document.querySelector(".game-image");
    lapScreen.src = imagePath;

    alert("Entered Code: " + code);
}
