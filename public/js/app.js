// $('#myModal').on('shown.bs.modal', function () {
//     $('#myInput').focus()
// });

window.setTimeout(function () {
    $(".notification").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 4000);

$(".clickable").click(function () {
    window.location = $(this).attr("href");
});