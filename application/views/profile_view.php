<?php
 $t = $this->session->userdata('user');
 $fname = $t['fullname'];
 $uname = $t['username'];
 $email = $t['email'];
 $address = $t['address'];
 $tsex = $t['sex'];
 if($tsex == 1){
     $sex = 'Male';
 }else{
     $sex = 'Female';
 }
 $birthday = $t['birthday'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
</head>

<body>
    <div align="left" align= "top"> <a href="home">Home </a></div>
    <p valign = "top" align = "right" >Xin chào <span><?php echo $t['username'];?></span></p>
     <?php
      echo form_open(base_url()."profile");
      echo form_fieldset("Profile"); ?>
      <table align = "center">
          <td>
                <?php echo form_label("Fullname : ");?>
          </td>
          <td>

                <?php echo htmlspecialchars($fname)."<br />";?>
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
                <?php echo htmlspecialchars($address)."<br />";?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Sex: ");?>
          </td>
          <td>
                <?php echo htmlspecialchars($sex);?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Birthday : ");?>
          </td>
          <td>
                <?php echo htmlspecialchars($birthday)?>
          </td>
      </tr>
      <tr>
          <td>
          </td>
          <td>
                <a href="profile/change_profile">Change</a>
          </td>
      </tr>
      </table>
      <?php
      echo form_fieldset_close();
      echo form_close();?>

</body>
</html>