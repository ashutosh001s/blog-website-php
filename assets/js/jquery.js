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
    $(this).css("border", "1px solid black");
    $('.resourses').show();
    $('.commentSection').hide();
});

$('#btn2').click(function () {
    $(this).css("border", "1px solid black");
    $('.commentSection').show();
    $('.resourses').hide();
});
