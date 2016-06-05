jQuery(document).ready(function($)
{ var url = window.location.pathname;
    var page=url.substr(url.lastIndexOf("/")+1);
    if (page==""){
        $('.nav a[href="index.php"]').parent().addClass('act');
        return;
    }
    $('.nav a[href="'+page+'"]').parent().addClass('act');
});
