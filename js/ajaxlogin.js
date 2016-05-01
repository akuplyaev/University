$(document).ready(function(){
    jQuery(function() {
        $("#ajax").click(function(event){
            var msg   = $("#formlog").serialize();
            if ($("#lg").val() !="" && $("#pswd").val()!="")
            {
                event.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'autorizate.php',
                    data: msg,
                    success: function (data) {
                        if (data==""){
                            window.location.reload();
                        }else{
                            $('#result').html(data);
                        }
                    },
                });
            }
            return false;
        });
    });
    jQuery(function() {
        $("#login").click(function () {
            $("#myModal").modal('show');
        });
    });
})

