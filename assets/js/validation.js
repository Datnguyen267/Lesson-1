/**
 *
 */
$(function(){
    $('form.registration').submit(function(){
        var b = true;
         if (check_fname($("input[name =fullname]").val())) {
             $("span.f").text("").show();
        }else{
            $("span.f").text("Fullname only contain a-Z and letters.").show();
            $("span.f").css('color', 'red');
            b = false;
         }

         if (check_uname($("input[name =username]").val())) {
             $("span.u").text("").show();
        }else{
            $("span.u").text("Username only contain a-Z 0-9 and underscope.").show();
            $("span.u").css('color', 'red');
            b = false;
         }

         if (check_email($("input[name =email]").val())) {
             $("span.e").text("").show();
         }else{
            $("span.e").text("The Email field must contain a valid email address.").show();
            $("span.e").css('color', 'red');
            b = false;
         }

         if (check_password($("input[name =password]").val())) {
             $("span.p").text("").show();
        }else{
            $("span.p").text("Password only contain a-Z 0-9 and special characters follow: @#$%!.").show();
            $("span.p").css('color', 'red');
            b = false;
         }

         if ($("input[name =repassword]").val() == $("input[name =password]").val()) {
             $("span.r").text("").show();
        }else{
            $("span.r").text("The Password field does not match the Re-Password field.").show();
            $("span.r").css('color', 'red');
            b = false;
         }

         if ($("input[name =address]").val() != "") {
             $("span.a").text("").show();
        }else{
            $("span.a").text("Please enter correct Address!").show();
            $("span.a").css('color', 'red');
            b = false;
         }

         if (check_captcha($("input[name =captcha]").val())) {
             $("span.c").text("").show();
        }else{
            $("span.c").text("Please enter correct captcha!").show();
            $("span.c").css('color', 'red');
            b = false;
         }

         if (check_sex($("input[name =sex]").val())) {
             $("span.s").text("").show();
        }else{
            $("span.s").text("Please seclect correct value of sex. Value only 1 or 2!").show();
            $("span.s").css('color', 'red');
            b = false;
         }
         if (check_birthday($("select[name =day]").val(),$("select[name =month]").val(),$("select[name =year]").val())) {
             $("span.b").text("").show();
        }else{
            $("span.b").text("Please seclect correct date!").show();
            $("span.b").css('color', 'red');
            b = false;
         }
         if(b ==  true){
             $('td#error').hide();
         }
         return b;
    });

    function check_fname(str){
        var nameRegex = /^[a-zA-Z ]+$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }
    function check_uname(str){
        var nameRegex = /^[a-zA-Z0-9_]+$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }
    function check_email(str){
        var nameRegex = /^\w+@[a-zA-Z_-]+?\.[a-zA-Z]{2,4}$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }
    function check_password(str){
        var nameRegex = /^[a-zA-Z0-9@#$%!]+$/;
        var c = str.match(nameRegex);
        if(c != null){
            return true;
        }else{
            return false;
        }
    }
    function isLeap(year){
        if(year%4== 0 && year%100 != 0 || year % 400 == 0){
            return true;
        }
        else{
            return false;
        }
    }
    function check_birthday(sday, smonth, syear){
        day = parseInt(sday);
        month = parseInt(smonth);
        year = parseInt(syear);
        if(isNaN(year)){
            return false;
        }
        switch(month){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                if(day <= 31){
                    return true;
                }else{
                    return false;
                }
                break;

            case 4:
            case 6:
            case 9:
            case 11:
                if(day <= 30){
                    return true;
                }else{
                    return false;
                }
                break;

            case 2:
                if(isLeap(year)){
                    if(day <= 29){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    if(day <= 28){
                        return true;
                    }else{
                        return false;
                    }
                }
                break;

            default:
                return false;
                break;
        }
    }
    function check_captcha(str){
        var nameRegex = /^[a-zA-Z0-9]+$/;
        var c = str.match(nameRegex);
        var clen = str.length;
        if(c != null && clen == 8){
            return true;
        }else{
            return false;
        }
    }
    function check_sex(str){
        if(str == 1 || str == 2){
            return true;
        }else{
            return false;
        }
    }

});