$(document).ready(function () {
    $(document).on("click", function () {
        let audio = $("#my_audio").get(0);
        audio.muted = false;
        audio.play();   
    });

});
