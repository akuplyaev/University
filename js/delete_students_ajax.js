jQuery(function (){
    $("#delete_students_btn").click(function (event) {
        var msg = $('form input:checked').serialize();
        event.preventDefault();
            $.ajax({
                type: 'post',
                data:msg,
                url: 'delete_std.php',
                success: function (data) {
                    $('#queryresult').html(data);
                }
            })
    });
});