let answer = -1;
$(document).ready(function () {

    let loaderElement = document.querySelector(".loader");
    // let answer = -1;
    let bananaPzzelShow = false;
    loaderElement.style.display = "none";


    // Clue 1: Show input when clicking
    $("#clue1").click(function () {

        let clueId = $(this).attr("id");

        if(!bananaPzzelShow){

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
        }else{
            $("#clue-submit").show();
            $("#clue-popup").fadeIn();
            $("#overlay").fadeIn();
        }
        bananaPzzelShow = true;
    });

    // $(".clue-submit").click(function (event) {
    //     event.stopPropagation();
    // });

    $(".digit-input").on("input", function () {
        let value = $(this).val();
        if (!/^[1-9]?$/.test(value)) {
            $(this).val(value.slice(0, 1));
        }
        // alert(answer);
        if (value == answer) {
            $(this).css({
                "color": "yellow",
                "font-weight": "900",
            });
            document.getElementById("digit-input").style.background = "black";
        }else{
            $(this).css({
                "color": "black",
            });
            if(value){

                toastr.error("😞 Try again!", {
                    timeOut: 500 
                });
            }
        }
    });
    
    

    // Clue 2: Show the input fields and overlay
    $("#clue2").click(function () {
        $(".clue-submit-door").fadeIn();
        $("#overlay").fadeIn();
    });

    

    // Clue 3: Show color boxes when clicked
    $(".clue-area-wall").click(function () {
        $(".box-group").fadeIn();
        $("#overlay").fadeIn();
    });

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
        return colorMap[rgb] || "red"; // Default to red if undefined
    }
    
    function updateSelectedOrder() {
        selectedOrder = $(".box").map(function () {
            return rgbToHex($(this).css("background-color"));
        }).get();
        checkOrder();
    }
    
    function checkOrder() {
        const correctOrder = ["purple", "blue", "green", "red"];
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

// Handle the Submit button for Clue 2
function unclockDoor(){
   
    let digit1 = $("#clue-input-door-1").val();
    let digit2 = $("#clue-input-door-2").val();
    let digit3 = $("#clue-input-door-3").val();
    let digit4 = $("#clue-input-door-4").val();

    let enteredCode = digit1 + digit2 + digit3 + digit4;
    let correctCode = "6"+answer+"89"; // Change to your actual correct code

    if (enteredCode === correctCode) {
        // alert("Correct! The door is unlocked.");
        $(".clue-submit-door, #overlay").fadeOut();
        document.querySelector(".close-room").style.display = "none";
        document.querySelector(".open-room").style.display = "block";

        gamestop();
    } 
};