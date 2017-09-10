// $('#myModal').on('shown.bs.modal', function () {
//     $('#myInput').focus()
// });

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2500);

$("div.clickable").click(function() {
    window.location = $(this).attr("href");
});