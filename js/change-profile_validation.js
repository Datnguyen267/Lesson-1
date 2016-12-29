/**
 *
 */
$(function(){
    $('form').submit(function(){
        var b = true;
         if (check_fname($("input[name =fullname]").val())) {
             $("span.f").text("").show();
        }else{
            $("span.f").text("Fullname only contain a-Z and letters.").show();
            b = false;
         }


         if ($("input[name =address]").val() != "") {
             $("span.a").text("").show();
        }else{
            $("span.a").text("Please enter correct Address!").show();
            b = false;
         }

            if (check_birthday($("select[name =bday]").val(),$("select[name =bmonth]").val(),$("select[name =byear]").val())) {
                 $("span.b").text("").show();
            }else{
                $("span.b").text("Please seclect correct date!").show();
                b = false;
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
    function check_sex(str){
        var nameRegex = /^[12]+$/;
        var c = str.match(nameRegex);
        var clen = str.length;
        if(c != null && clen == 8){
            return true;
        }else{
            return false;
        }
    }

});