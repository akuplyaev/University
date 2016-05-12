jQuery(document).ready(function($) {
    var id = $("#subj :selected").val();
    $.ajax({
        type: "POST",
        url: "selected.php",
        data: {"id": id},
        success: function (data) {
            $("#professors").html(data);

        }
    });
})
    jQuery(function () {
        $("#subj").change(function () {
            var id = $("#subj :selected").val();
            $.ajax({
                type: "POST",
                url: "selected.php",
                data: {"id": id},
                success: function (data) {
                    $("#professors").html(data);

                }
            });
        });
    });
