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

$('#btn1').css("border-bottom", "2px solid black");
$('.resourses').show()
$('.commentSection').hide()

$('#btn1').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid black");
    $('.resourses').show();
    $('.commentSection').hide();
});

$('#btn2').click(function () {
    $('.showContent button').css("border", "none");
    $(this).css("border-bottom", "2px solid black");
    $('.commentSection').show();
    $('.resourses').hide();
});
