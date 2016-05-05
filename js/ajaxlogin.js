$(document).ready(function(){
    jQuery(function() {
        $("#ajax").click(function(event){
            var msg   = $("#formlog").serialize();
            if ($("#lg").val() !=="" && $("#pswd").val()!=="")
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

        });
    });
    jQuery(function() {
        $("#login").click(function () {
            $("#myModal").modal('show');
        });
    });
    jQuery(function() {
        $("#mainbutton").click(function () {
            $.ajax({
                type: 'post',
                url: 'choice.php',
                success: function (data) {
                    if (data!=="") {
                        $("#myModal").modal('show');
                        $('#result').html(data);
                    }
                    else
                    {
                        location.href="kurs.php";
                    }
                },
            });
        });
    });
    jQuery(function() {
        $("#search-prep").click(function (event) {
            var msg   = $("#searchprepform").serialize();
            if ($("#fname").val() !=="" && $("#mname").val()!=="") {
                event.preventDefault();
                $.ajax({
                    type: 'post',
                    data: msg,
                    url: 'searchprep.php',
                    success: function (data) {
                        $('#ressearch').html(data);
                    }
                });
            }
        });
    })
});


