$(document).ready(function () {

    let loaderElement = document.querySelector(".loader");

    loaderElement.style.display = "none";

    // Clue 1: Show input when clicking
    $("#clue1").click(function () {

        let clueId = $(this).attr("id");

        $.ajax({
            type: "GET",
            url: "/puzzel",
            beforeSend: function () {
                loaderElement.style.display = "block";
            },
            success: function (response) {
                loaderElement.style.display = "none";

                let base64String = response.question;
                answer = response.solution;
                console.log("solution key:", answer);
                imagePuzzle = "data:image/png;base64," + base64String;
                
                $("#clue-text").text("Enter the secret code:");
                $("#clue-input").val("").show();
                $("#clue-submit").show();
                $("#clue-popup").fadeIn();
                $("#overlay").fadeIn();

                const lapScreen = document.querySelector(".clue-popup");
                    lapScreen.style.backgroundImage =
                        'url("data:image/png;base64,' + base64String + '")';
                    lapScreen.style.backgroundSize = "contain";
            },
            error: function (xhr, status, error) {
                toastr.error('@lang("messages.something_went_wrong")');
            },
        });


        
    });

    // Handle Clue 1 input submission
    $("#clue-submit").click(function () {
        let enteredNumber = $("#clue-input").val();
        if (enteredNumber === "1234") {
            // Change to your secret code
            alert("Correct! You found a hidden key.");
            $("#clue-popup, #overlay").fadeOut();
        } else {
            alert("Wrong code! Try again.");
        }
    });

    // Clue 2: Show the input fields and overlay
    $("#clue2").click(function () {
        $(".clue-submit-door").fadeIn();
        $("#overlay").fadeIn();
    });

    // Handle the Submit button for Clue 2
    $("#clue-submit-door").click(function () {
        let digit1 = $("#clue-input-door-1").val();
        let digit2 = $("#clue-input-door-2").val();
        let digit3 = $("#clue-input-door-3").val();
        let digit4 = $("#clue-input-door-4").val();

        let enteredCode = digit1 + digit2 + digit3 + digit4;
        let correctCode = "1234"; // Change to your actual correct code

        if (enteredCode === correctCode) {
            alert("Correct! The door is unlocked.");
            $(".clue-submit-door, #overlay").fadeOut();
        } else {
            alert("Wrong code! Try again.");
        }
    });

    // Clue 3: Show color boxes when clicked
    $(".clue-area-wall").click(function () {
        $(".box-group").fadeIn();
        $("#overlay").fadeIn();
    });

    const colors = ["red", "blue", "purple", "green"]; // Replaced "yellow" with "purple"

    $(".box").click(function () {
        let currentColor = rgbToHex($(this).css("background-color"));
        let currentIndex = colors.indexOf(currentColor);

        let nextIndex = (currentIndex + 1) % colors.length;
        $(this).css("background-color", colors[nextIndex]);
    });

    function rgbToHex(rgb) {
        let colorMap = {
            "rgb(255, 0, 0)": "red",
            "rgb(0, 0, 255)": "blue",
            "rgb(128, 0, 128)": "purple",
            "rgb(0, 128, 0)": "green",
        };
        return colorMap[rgb] || "red"; // Default to red if undefined
    }
    // Close popups when clicking overlay
    $("#overlay").click(function () {
        $(".box-group, .clue-submit-door, #clue-popup").fadeOut();
        $("#overlay").fadeOut();
    });

    // Close button for Clue 1
    $("#clue-close").click(function () {
        $("#clue-popup, #overlay").fadeOut();
    });

    // Close button for Clue 2
    $("#clue-close-door").click(function () {
        $(".clue-submit-door, #overlay").fadeOut();
    });
});
