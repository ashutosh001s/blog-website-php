$(function () {
    $("a").each(function () {
        if ($(this).attr("href") == window.location.pathname) {
            $(this).children().addClass("selected");
        }
    });
});


$('#hidePlayer').click(function () {
    $("#videoSection").toggle();
    $(this).val($(this).val() == 'Hide Player' ? 'Show Player' : 'Hide Player');
});
