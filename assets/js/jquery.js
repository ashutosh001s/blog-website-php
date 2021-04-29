$(function () {
    $("a").each(function () {
        if ($(this).attr("href") == window.location.pathname) {
            $(this).children().addClass("selected");
        }
    });
});
$("#hidePlayer").click(function () {
    $("#videoSection").toggle();
});

$('#btn1').css("border-bottom", "2px solid #ffc107");
$('#contentBar').show();
$('.resourses').hide()
$('.commentSection').hide()

$('#btn1').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('#contentBar').show();
    $('.resourses').hide();
    $('.commentSection').hide();
});

$('#btn2').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('.commentSection').show();
    $('.resourses').hide();
    $('#contentBar').hide();
});

$('#btn3').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid #ffc107");
    $('.resourses').show();
    $('#contentBar').hide();
    $('.commentSection').hide();
});

