$(document).ready(hasiera);

function hasiera() {
    $("#animatu").click(function () {
        $("#cofre").animate({
            bottom: '250px',
            opacity: '0',
            height: '0px',

        }, 1500);
    });

    $("#animatu").click(function () {
        $("#oro").slideDown(1500);
    });

}
