<?php
$t = $this->session->userdata('user');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/change-password_validation.js"> </script>
</head>
<body>
     <?php
      echo form_open(base_url()."member/changepassword/change_password");
      echo form_fieldset("Change your password"); ?>
      <table align = "center">
          <td>
                <?php echo form_label("Old password : ");?>
          </td>
          <td>
                <?php echo form_password('oldpass')."<br />";?>
          </td>
          <td>
                  <?php echo form_error('oldpass');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("New password : ");?>
          </td>
          <td>
                <?php echo form_password('newpass')."<span class = n></span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('newpass');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Confirm new password : ");?>
          </td>
          <td>
                <?php echo form_password('renewpass')."<span class = r></span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('renewpass');?>
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