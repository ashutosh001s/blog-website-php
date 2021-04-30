$(function () {
    $("a").each(function () {
        if ($(this).attr("href") == window.location.pathname) {
            $(this).children().addClass("selected");
        }
    });
});
$(".hidePlayer").click(function () {
    $("#videoSection").toggle();
});

$(document).ready(function () {

    if (screen.width < 990) {
        $("#content").show();
    }
    else {

        
        $("#content").hide();
    }

});

$('#overview').css("border-bottom", "2px solid #ffc107");
$('.resourses').show();
$('#contentBar').hide();
$('.commentSection').hide();

$('#overview').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('.resourses').show();
    $('#contentBar').hide();
    $('.commentSection').hide();
});

$('#content').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('#contentBar').show();
    $('.resourses').hide();
    $('.commentSection').hide();
});

$('#question').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('.commentSection').show();
    $('#contentBar').hide();
    $('.resourses').hide();
});

