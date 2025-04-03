let answer = 5;
let lapshow = false;

$(document).ready(function () {
    bananaPuzzle();

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

    // clue are showing
    $("#clue2").click(function () {
        document.querySelector(".clue-submit-pass").style.display = "flex";
        $("#overlay").fadeIn();
    });

    $("#clue4").click(function () {
        $(".clue-book").show();
        $("#overlay").fadeIn();
    });

    $("#clue5").click(function () {
        if (!lapshow) {
            lapshow = true;
            $(".lap-screen").fadeIn();
        }
    });

    $(".clue-area-wall").click(function () {
        $(".box-group").fadeIn();
        $("#overlay").fadeIn();
    });

    // box color changing
    const colors = ["black", "yellow"];
    let selectedOrder = [];

    $(".box").click(function () {
        let currentColor = rgbToHex($(this).css("background-color"));
        let nextColor = currentColor === "black" ? "yellow" : "black";

        $(this).css("background-color", nextColor);
        updateSelectedOrder();
    });

    function rgbToHex(rgb) {
        let colorMap = {
            "rgb(0, 0, 0)": "black",
            "rgb(255, 255, 0)": "yellow",
        };
        return colorMap[rgb] || "black";
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
        const correctOrder = [
            "yellow",
            "black",
            "black",
            "black",
            "black",
            "yellow",
            "black",
            "yellow",
            "black",
        ];
        if (arraysEqual(selectedOrder, correctOrder)) {
            $(".box1").text("4");
            $(".box2").text("6");
            $(".box3").text("1");
        }
    }

    function arraysEqual(a, b) {
        return JSON.stringify(a) === JSON.stringify(b);
    }

    $("#overlay").click(function () {
        $(".box-group, .clue-submit-door").fadeOut();
        $(".clue-book").fadeOut();
        $(".clue-submit-pass").fadeOut();
        $("#overlay").fadeOut();
    });

    $("#clue-close-door").click(function () {
        $(".clue-submit-door, #overlay").fadeOut();
    });

    //  checking final door code
    const passInput = document.getElementById("passInput");
    const buttons = document.querySelectorAll(".btn");
    const correctCode = "416";

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const val = button.getAttribute("data-number");

            if (val === "clear") {
                passInput.value = "";
            } else if (val === "") {
                passInput.value = passInput.value.slice(0, -1);
            } else {
                if (passInput.value.length < 3) {
                    passInput.value += val;
                }

                if (passInput.value.length === 3) {
                    if (passInput.value === correctCode) {
                        $(".clue-submit-pass").fadeOut();
                        $("#overlay").fadeOut();
                        document.querySelector(".close-room").style.display =
                            "none";
                        document.querySelector(".open-room").style.display =
                            "block";
                        document.querySelector(".sparckls").style.display =
                            "inline";
                        gamestop(); //  call to common js
                    } else {
                        passInput.value = "";
                    }
                }
            }
        });
    });
});

// laptop password check
function unclock() {
    let password = $("#password").val();

    if (password == "tones") {
        $("#password")
            .css({
                "background-color": "rgb(200 251 197)",
                color: "black",
            })
            .val("")
            .attr("placeholder", "Enter banana value");

        document.getElementById("unlock-btn").style.display = "none";
        document.getElementById("unlock-btn2").style.display = "block";
    } else {
        $("#password").val("").attr("placeholder", "TRY AGAIN");
    }
}

//  banana count check
function unclock2() {
    let password = $("#password").val();

    if (password == answer) {
        document.querySelector(".lap-screen").style.display = "none";
        document.getElementById("lap-sol").style.display = "block";
    } else {
        $("#password").val("").attr("placeholder", "TRY AGAIN");
    }
}

// banana API calling
function bananaPuzzle() {
    $.ajax({
        type: "GET",
        url: "/puzzel",
        success: function (response) {
            let base64String = response.question;
            answer = response.solution;
            console.log("solution key:", answer);
            imagePuzzle = "data:image/png;base64," + base64String;
            document.querySelector(".banana-canvas").src = imagePuzzle;
        },
        error: function (xhr, status, error) {},
    });
}
