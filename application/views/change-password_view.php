<?php
$t = $this->session->userdata('user');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
$(function(){
    $('form').submit(function(){
        var b = true;
         if (check_password($("input[name =newpass]").val())) {
             $("span.n").text("").show();
        }else{
            $("span.n").text("Giá trị bạn nhập vào không đúng, mời nhập lại.").show();
            b = false;
         }

         if ($("input[name =newpass]").val() == $("input[name =renewpass]").val()) {
             $("span.r").text("").show();
        }else{
            $("span.r").text("Mật khẩu xác nhận không trùng khớp, mời nhập lại.").show();
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
</script>
</head>

<body>
     <div align="left" align= "top"> <a href="../home">Home </a></div>
    <p valign = "top" align = "right" >Xin chào <span><?php echo $t['username'];?></span></p>
     <?php
      echo validation_errors();
      echo form_open(base_url()."changepassword/change_password");
      echo form_fieldset("Change your password"); ?>
      <table align = "center">
          <td>
                <?php echo form_label("Old password : ");?>
          </td>
          <td>
                <?php echo form_password('oldpass')."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("New password : ");?>
          </td>
          <td>
                <?php echo form_password('newpass')."<span class = n></span>"."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Confirm new password : ");?>
          </td>
          <td>
                <?php echo form_password('renewpass')."<span class = r></span>"."<br />";?>
          </td>
      </tr>
      <tr>
          <td align = "right">
                <?php echo form_submit("ok", "Change")."<br />";?>
          </td>
          <td>
          </td>
      </tr>

      </table>
      <?php
      echo form_fieldset_close();
      echo form_close();?>

</body>
</html>