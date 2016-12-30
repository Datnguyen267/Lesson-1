/**
 *
 */
$(function(){
    $('form.email').submit(function(){
        var b = true;

         if (check_email($("input[name =email]").val())) {
             $("span.e").text("").show();
         }else{
            $("span.e").text("The Email field must contain a valid email address.").show();
            $("span.e").css('color', 'red');
            b = false;
         }
         return b;
    });

    function check_email(str){
        var nameRegex = /^\w+@[a-zA-Z_-]+?\.[a-zA-Z]{2,4}$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }

});