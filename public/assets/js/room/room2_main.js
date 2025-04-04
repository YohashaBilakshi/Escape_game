let answer = -1;
let doorLockShow = false;

$(document).ready(function () {
    let loaderElement = document.querySelector(".loader");
    let bananaPzzelShow = false;
    loaderElement.style.display = "none";

    // fetching banana API
    $("#clue1").click(function () {
        let clueId = $(this).attr("id");
        if (!bananaPzzelShow) {
            $.ajax({
                type: "GET",
                url: "/puzzel",
                beforeSend: function () {
                    // RIFER SOURCE : https://chatgpt.com/  - before send apply
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
        } else {
            $("#clue-submit").show();
            $("#clue-popup").fadeIn();
            $("#overlay").fadeIn();
        }
        bananaPzzelShow = true;
    });

    // RIFER SOURCE : https://chatgpt.com/  - digit input
    $(".digit-input").on("input", function () {
        let value = $(this).val();
        if (!/^[1-9]?$/.test(value)) {
            $(this).val(value.slice(0, 1));
        }
        if (value == answer) {
            $(this).css({
                color: "yellow",
                "font-weight": "900",
            });
            document.getElementById("digit-input").style.background = "black";
        } else {
            $(this).css({
                color: "black",
            });
            if (value) {
                toastr.error("😞 Try again!", {
                    timeOut: 500,
                });
            }
        }
    });

    $("#clue2").click(function () {
        if (!doorLockShow) {
            $(".clue-submit-door").fadeIn();
            $("#overlay").fadeIn();
        }
    });

    $(".clue-area-wall").click(function () {
        $(".box-group").fadeIn();
        $("#overlay").fadeIn();
    });

    // REFER SOURCE : https://chatgpt.com/  box color changes 
    const colors = ["red", "blue", "purple", "green"];
    let selectedOrder = [];

    $(".box").click(function () {
        let currentColor = rgbToHex($(this).css("background-color"));
        let currentIndex = colors.indexOf(currentColor);
        let nextIndex = (currentIndex + 1) % colors.length;
        let newColor = colors[nextIndex];

        $(this).css("background-color", newColor);
        updateSelectedOrder();
    });

    function rgbToHex(rgb) {
        let colorMap = {
            "rgb(255, 0, 0)": "red",
            "rgb(0, 0, 255)": "blue",
            "rgb(128, 0, 128)": "purple",
            "rgb(0, 128, 0)": "green",
        };
        return colorMap[rgb] || "red";
    }

    function updateSelectedOrder() {
        selectedOrder = $(".box")
            .map(function () {
                return rgbToHex($(this).css("background-color"));
            })
            .get();
        checkOrder();
    }

    function checkOrder() {
        const correctOrder = ["green", "blue", "purple", "red"];
        if (arraysEqual(selectedOrder, correctOrder)) {
            $(".color-answer").show();
            $(".hint").hide();
        } else {
            $(".color-answer").hide();
        }
    }

    function arraysEqual(a, b) {
        return JSON.stringify(a) === JSON.stringify(b);
    }

    $("#overlay").click(function () {
        $(".box-group, .clue-submit-door, #clue-popup").fadeOut();
        $("#overlay").fadeOut();
    });

    $("#clue-close").click(function () {
        $("#clue-popup, #overlay").fadeOut();
    });

    $("#clue-close-door").click(function () {
        $(".clue-submit-door, #overlay").fadeOut();
    });
});

//  final door unlock
function unclockDoor() {
    let digit1 = $("#clue-input-door-1").val();
    let digit2 = $("#clue-input-door-2").val();
    let digit3 = $("#clue-input-door-3").val();
    let digit4 = $("#clue-input-door-4").val();

    let enteredCode = digit1 + digit2 + digit3 + digit4;
    let correctCode = "6" + answer + "89";

    if (enteredCode === correctCode) {
        $(".clue-submit-door, #overlay").fadeOut();
        document.querySelector(".close-room").style.display = "none";
        document.querySelector(".open-room").style.display = "block";
        document.querySelector(".sparckls").style.display = "inline";
        doorLockShow = true;
        gamestop(); //  call to common js
    }
}
