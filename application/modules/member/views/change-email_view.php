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
<script type="text/javascript" src="<?php echo base_url();?>js/change-email_validation.js"> </script>
</head>

<body>
     <?php
      echo form_open(base_url()."member/changeemail/change_email");
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
                <?php echo form_input('email', $this->input->post("email"))."<span class= e></span>"."<br />";?>
          </td>
          <td>
                  <?php echo form_error('email')?>
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