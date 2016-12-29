<?php
 $t = $this->session->userdata('user');
 $uname = $t['username'];
 $email = $t['email'];
 $day = array("Day");
 for($i = 1; $i< 32; $i++){
     $day[$i] = $i;
 }
 $month = array("Month");
 for($i = 1; $i< 13; $i++){
     $month[$i] = $i;
 }

 $year = array("Year");
 for($i = date('Y'); $i >= date('Y') - 100; $i--){
     $year[$i] = $i;
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">

// Ajax post for refresh captcha image.
$(document).ready(function() {
    $("a.refresh").click(function() {
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>" + "registration/captcha_refresh",
            success: function(res) {
                if (res)
                {
                    jQuery("td.captcha").html(res);
                }
            }
        });
    });
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

        switch(parseInt(num)){
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $("select.day").empty();
                $("select.day").append('<option>Day</option>');
                for(var i = 1; i<=31; i++){
                        $("select.day").append('<option>'+i+'</option>');
                }
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $("select.day").empty();
                $("select.day").append('<option>Day</option>');
                for(var i = 1; i<=30; i++){
                        $("select.day").append("<option>"+i+"</option>");
                }
                break;
            case 2:
                if(isLeap($("select.year").val())){
                    $("select.day").empty();
                    $("select.day").append('<option>Day</option>');
                      for(var i = 1; i<=29; i++){
                         $("select.day").append("<option>"+i+"</option>");
                      }
                    }else{
                        $("select.day").empty();
                        $("select.day").append('<option>Day</option>');
                        for(var i = 1; i<=28; i++){
                         $("select.day").append("<option>"+i+"</option>");
                      }
                    }
                break;
            default:
                break;
          }
    });
    $("select.year").change(function(){
                if(isLeap($(this).val()) == true &&   $("select.month").val() == 2){
                $("select.day").empty();
                $("select.day").append('<option>Day</option>');
                  for(var i = 1; i<=29; i++){
                     $("select.day").append("<option>"+i+"</option>");
                  }
                }else{
                    if($("select.month").val() == 2){
                        $("select.day").empty();
                        $("select.day").append('<option>Day</option>');
                          for(var i = 1; i<=28; i++){
                             $("select.day").append("<option>"+i+"</option>");
                          }
                    }
                }
         });
});
</script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(function(){
    $('form').submit(function(){
        var b = true;
         if ($("input[name =fullname]").val() != "") {
             $("span.f").text("").show();
        }else{
            $("span.f").text("Giá trị bạn nhập vào không hợp lệ, mời nhập lại.").show();
            b = false;
         }

         if ($("input[name =address]").val() != "") {
             $("span.a").text("").show();
        }else{
            $("span.a").text("Giá trị bạn nhập vào không đúng, mời nhập lại.").show();
            b = false;
         }

            if (check_birthday($("select[name =bday]").val(),$("select[name =bmonth]").val(),$("select[name =byear]").val())) {
                 $("span.b").text("").show();
            }else{
                $("span.b").text("Ngày tháng không đúng, mời chọn lại.").show();
                b = false;
             }

         return b;
    });
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

});
</script>
</head>

<body>
    <div align="left" align= "top"> <a href="../home">Home </a></div>
    <p valign = "top" align = "right" >Xin chào <span><?php echo $t['username'];?></span></p>
     <?php
      echo validation_errors();
      echo form_open(base_url()."profile/change_profile");
      echo form_fieldset("Change Profile"); ?>
      <table align = "center">
          <td>
                <?php echo form_label("Fullname : ");?>
          </td>
          <td>

               <?php echo form_input('fullname',$this->input->post('fullname')). "<span class = 'f'> </span>"."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Username : ");?>
          </td>
          <td>
                <?php echo htmlspecialchars($uname)."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Email : ");?>
          </td>
          <td>
                <?php echo htmlspecialchars($email)."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Address : ");?>
          </td>
          <td>
                <?php echo form_input('address',$this->input->post('address'))."<span class = 'a'> </span>"."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Sex: ");?>
          </td>
          <td>
                <?php echo form_radio('sex','1',TRUE)."Male".form_radio('sex','2')."Female"."<br />"?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Birthday : ");?>
          </td>
          <td>
                <?php
                echo "<select  name = 'bday' class='day'>";
                echo "<option value = 'Day' selected >Day</option>";
                for($i=1;$i<=31;$i++){
                    echo "<option>$i</option> ";
                }
                echo "</select>";


                echo "<select name = 'bmonth' class='month'>";
                echo "<option value = 'Month' selected>Month</option>";
                for($i=1;$i<=12;$i++){
                    echo "<option>$i</option> ";
                }
                echo "</select>";

                echo "<select name = 'byear' class='year'>";
                echo "<option value = 'Year' selected>Year</option>";
                for($i=date('Y');$i>= date('Y') -100 ;$i--){
                    echo "<option >$i</option>";
                }
                echo "</select>"."<span class = 'b'> </span>";
                ?>
          </td>
      </tr>
      <tr>
          <td>
          </td>
          <td>
                <?php echo form_submit("save",  "Save");?>
          </td>
      </tr>
      </table>
      <?php
      echo form_fieldset_close();
      echo form_close();?>

</body>
</html>