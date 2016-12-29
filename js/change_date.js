/**
 *
 */
$(document).ready(function() {
    function isLeap(year){
        if(year%4== 0 && year%100 != 0 || year % 400 == 0){
            return true;
        }
        else{
            return false;
        }
    }
    $("select.month").change(function(){
        var num = $(this).val();
        console.log(num);
        switch(parseInt(num)){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                var temp = $('select.day').val();
                $('select.day').empty();
                for(var i = 1; i<=31; i++){
                    if(i == temp){
                        $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                    }else{
                        $('select.day').append('<option value ='+i+'> '+i+'</option>');
                    }
                }
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                var temp = $('select.day').val();
                $('select.day').empty();
                for(var i = 1; i<=30; i++){
                    if(i == temp){
                        $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                    }else{
                        $('select.day').append('<option value ='+i+'> '+i+'</option>');
                    }
                }
                break;
            case 2:
                if(isLeap($("select.year").val())){
                    var temp = $('select.day').val();
                    $('select.day').empty();
                    for(var i = 1; i<=29; i++){
                        if(i == temp){
                            $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                        }else{
                            $('select.day').append('<option value ='+i+'> '+i+'</option>');
                        }
                    }
                    }else{
                        var temp = $('select.day').val();
                        $('select.day').empty();
                        for(var i = 1; i<=28; i++){
                            if(i == temp){
                                $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                            }else{
                                $('select.day').append('<option value ='+i+'> '+i+'</option>');
                            }
                        }
                    }
                break;
            default:
                break;
          }
    });
    $("select.year").change(function(){
         if(isLeap($(this).val()) == true &&   $("select.month").val() == 2){
             var temp = $('select.day').val();
             $('select.day').empty();
             for(var i = 1; i<=29; i++){
                 if(i == temp){
                     $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                 }else{
                     $('select.day').append('<option value ='+i+'> '+i+'</option>');
                 }
             }
             }else{
                 if($("select.month").val() == 2){
                     var temp = $('select.day').val();
                     $('select.day').empty();
                     for(var i = 1; i<=28; i++){
                         if(i == temp){
                             $('select.day').append('<option value ='+i+' selected> '+i+'</option>');
                         }else{
                             $('select.day').append('<option value ='+i+'> '+i+'</option>');
                         }
                     }
                 }
             }
         });
});