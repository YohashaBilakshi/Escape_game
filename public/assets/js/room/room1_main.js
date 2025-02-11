$(document).ready(function () {});

function showPopup() {
    document.getElementById("popup").style.display = "block";
}

function hidePopup() {
    document.getElementById("popup").style.display = "none";
    document.getElementById("banana-canvas").style.display = "none";
}

document.body.addEventListener("click", function (event) {

    let popup = document.getElementById("popup");
    let bananaCanvas = document.getElementById("banana-canvas");
    let paper = document.querySelector(".showEnvelope"); 
    let keyboardBox = document.getElementById("key-board");

    if (
        event.target !== popup.querySelector("img") &&
        event.target !== paper &&
        event.target !== bananaCanvas.querySelector(".key-board")
    ) {
        hidePopup();
    }
});

document.getElementById("popup").addEventListener("click", function (event) {
    event.stopPropagation();
});

$(document).on("click", ".showEnvelope", function (e) {
    showPopup();
});

document.getElementById("puzzel").addEventListener("click", function (e) {
    $.ajax({
        type: "GET",
        url: "/puzzel",
        beforeSend: function () {
          
            let canvasElement = document.querySelector(".banana-canvas");
            let loaderElement = document.querySelector(".loader");
            let imageElement = document.getElementById("base64Image");
            let keyboard = document.querySelector(".key-board");

            canvasElement.style.display = "flex"; 
            loaderElement.style.display = "block"; 
            imageElement.style.display = "none"; 
            keyboard.style.display = "none";
        },
        success: function (response) {

            let base64String = response.question;
            let imageElement = document.getElementById("base64Image");
            let loaderElement = document.querySelector(".loader");
            let keyboard = document.querySelector(".key-board");

            imageElement.src = "data:image/png;base64," + base64String;
            loaderElement.style.display = "none";
            imageElement.style.display = "block";
            keyboard.style.display = "block";
        },
        error: function (xhr, status, error) {
            toastr.error('@lang("messages.something_went_wrong")');
        },
    });
});

function hideCanvas(event) {
    let canvasElement = document.querySelector(".banana-canvas");
    if (!canvasElement.contains(event.target)) {
        canvasElement.style.display = "none";
    }
}
