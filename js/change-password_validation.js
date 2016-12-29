/**
 *
 */
$(function(){
    $('form').submit(function(){
        var b = true;

         if (check_password($("input[name =newpass]").val())) {
             $("span.n").text("").show();
        }else{
            $("span.n").text("New Password only contain a-Z 0-9 and special characters follow: @#$%!.").show();
            b = false;
         }

         if ($("input[name =renewpass]").val() == $("input[name =newpass]").val()) {
             $("span.r").text("").show();
        }else{
            $("span.r").text("The Re New Password field does not match the Re-Password field.").show();
            b = false;
         }
         return b;
    });

    function check_password(str){
        var nameRegex = /^[a-zA-Z0-9@#$%!]+$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }

});