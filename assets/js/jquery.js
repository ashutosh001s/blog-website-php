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

$('#btn1').click(function () {
    $('.commentSection').show();
    $('.resourses').hide();
});
$('#btn2').click(function () {
    $('.resourses').show();
    $('.commentSection').hide();
});