$(function () {
    $('#exampleModal').on('show.bs.modal', function (e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: 'footer.php',
            data: 'id=' + id,
            method: 'post',
            success: function (data) {
                $('.qwick-view-left').html(data);
                // console.log(data);
            }
        });
    });
});