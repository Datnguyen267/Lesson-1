<?php
$t = $this->session->userdata('user');
$email = $t['email'];
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
         if (check_email($("input[name =email]").val())) {
             $("span.e").text("").show();
         }else{
            $("span.e").text("Giá trị bạn nhập vào không hợp lệ, mời nhập lại.").show();
            b = false;
         }
         return b;
    });
    function check_email(str){
        var nameRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
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
      echo form_open(base_url()."changeemail/change_email");
      echo form_fieldset("Change your email"); ?>
      <table align = "center">
      <tr>
          <td>
                <?php echo form_label("Current email : ");?>
          </td>
          <td>
                <?php echo htmlspecialchars($email)."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("New email : ");?>
          </td>
          <td>
                <?php echo form_input('email')."<span class= e></span>"."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
          </td>
          <td>
                <?php echo form_submit("change",  "Change");?>
          </td>
      </tr>
      </table>
      <?php
      echo form_fieldset_close();
      echo form_close();?>

</body>
</html>