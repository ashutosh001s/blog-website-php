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
$('.resourses').show()
$('.commentSection').hide()

$('#btn1').click(function () {
    $('#btn1').css("border-bottom", "2px solid black !important");
    $('.resourses').show();
    $('.commentSection').hide();
});

$('#btn2').click(function () {
    $('#btn2').css("border-bottom", "2px solid black !important");
    $('.commentSection').show();
    $('.resourses').hide();
});
