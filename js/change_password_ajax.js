jQuery(function (){
    $("#change_psw").click(function (event) {
        var msg   = $("#frm_chg_psw").serialize();
        if ($("#psw_chg_input").val() !=="") {
            event.preventDefault();
            $.ajax({
                type: 'post',
                data:msg,
                url: 'change_psw.php',
                success: function (data) {
                $('#queryresult').html(data);
            }
        })
        }
    });
});