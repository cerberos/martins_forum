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

$('#editReply').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var message = button.data('message')
    var destination = button.data('destination')
    var modal = $(this)
    modal.find('#messageForm').attr('action',destination)
    modal.find('#message-text').val(message)
});

$('#editPost').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var title = button.data('title')
    var message = button.data('message')
    var destination = button.data('destination')
    var modal = $(this)
    modal.find('#postForm').attr('action',destination)
    modal.find('#title').val(title)
    modal.find('#message-text').val(message)
});

$('#replySubmit').click(function() {
    $("#messageForm").submit();
});

$('#postSubmit').click(function() {
    $("#postForm").submit();
});

$('#categorySubmit').click(function() {
    $("#categoryForm").submit();
});

$('#editCategory').on('shown.bs.modal', function () {
    $('#categoryTitle').focus();
})

$('#editCategory').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) ;// Button that triggered the modal
    var title = button.data('title');
    var description = button.data('description');
    var destination = button.data('destination');
    var modal = $(this);
    modal.find('#categoryForm').attr('action',destination);
    modal.find('#categoryTitle').val(title);
    modal.find('#categoryBody').val(description);
})