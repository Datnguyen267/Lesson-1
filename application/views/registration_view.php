 <?php
 $fname=array(
        "name" => "fullname",
        "size" => "25",
);
$user=array(
        "name" => "username",
        "size" => "25",
);
$pass=array(
        "name" => "pass",
        "size" => "25",
);
$email=array(
        "name" => "email",
        "size" => "25",
);
$day = array('Day');
for($i = 1; $i<=31; $i++){
    $day[$i] = $i;
}
$month =array('Month');
for($i = 1; $i<=12; $i++){
    $month[$i] = $i;
}
$year =array('Year');
$now = getdate();
for($i = $now['year'] - 1; $i>=$now['year'] - 100; $i--){
    $year[$i] = $i;
}
$cancel = array(
        'name'          => 'button',
        'id'            => 'button',
        'value'         => 'true',
        'type'          => 'reset',
        'content'       => 'Reset'
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/change_date.js"> </script>
<script type="text/javascript" src="<?php echo base_url();?>js/refresh_captcha.js"> </script>
<script type="text/javascript" src="<?php echo base_url();?>js/validation.js"> </script>
</head>

<body>
    <div align="center">
        <p>Menu</p>
        <a href = "main">1. Main </a> </br>
        <a href = "login">2. Login </a>
    </div>
     <?php
      echo form_open(base_url()."registration");
      echo form_fieldset("Registration form");
      ?>
      <table align = "center">
      <tr>
          <td>
                <?php echo form_label("Fullname (*) : ");?>
          </td>
          <td>

                <?php echo form_input('fullname',$this->input->post('fullname')). "<span class = 'f'> </span>"."<br />";?>
          </td>
          <td>
                  <?php echo form_error('fullname');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Username (*) : ");?>
          </td>
          <td>
                <?php echo form_input('username',$this->input->post('username')). "<span class = 'u'> </span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('username');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Email (*) : ");?>
          </td>
          <td>
                <?php echo form_input('email',$this->input->post('email')). "<span class = 'e'> </span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('email');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Password (*) : ");?>
          </td>
          <td>
                <?php echo form_password('password')."<span class = 'p'> </span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('password');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Re-Password (*) : ");?>
          </td>
          <td>
                <?php echo form_password('repassword')."<span class = 'r'> </span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('repassword');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Address (*) : ");?>
          </td>
          <td>
                <?php echo form_input('address',$this->input->post('address'))."<span class = 'a'> </span>"."<br />";?>
          </td>
           <td>
                  <?php echo form_error('address');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Sex: ");?>
          </td>
          <td>
                <?php echo form_radio('sex','1',TRUE)."Male".form_radio('sex','2')."Female"."<br />"?>
          </td>
           <td>
                  <?php echo form_error('sex');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Birthday (*) : ");?>
          </td>
          <td>

                <?php
                echo "<select  name = 'bday' class='day'>";
                echo "<option value = 'Day' selected >Day</option>";
                for($i=1;$i<=31;$i++){
                    echo "<option value='$i'>$i</option> ";
                }
                echo "</select>";


                echo "<select name = 'bmonth' class='month'>";
                echo "<option value = 'Month' selected>Month</option>";
                for($i=1;$i<=12;$i++){
                    echo "<option value='$i'>$i</option> ";
                }
                echo "</select>";

                echo "<select name = 'byear' class='year'>";
                echo "<option value = 'Year' selected>Year</option>";
                for($i=date('Y') - 1;$i>= date('Y') -100 ;$i--){
                    echo "<option value='$i'>$i</option>";
                }
                echo "</select>"."<span class = 'b'> </span>";
                ?>


          </td>
           <td>
                  <?php echo form_error('fullname');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Security check: ");?>
          </td>
          <td class = 'captcha'>
          <?php
                echo $captcha['image'];
          ?>

          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Text in the box: ");?>
          </td>
          <td>
                <?php echo form_input('captcha')."<span class = 'c'> </span>"; echo "<a href='#' class ='refresh'><img id = 'ref_symbol' width = '20px' heigth = '20px' src =".base_url()."img/refresh.png></a>"."<br />"; ?>
          </td>
           <td>
                  <?php echo form_error('captcha');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_submit("regist",  "Regist");?>
          </td>
          <td>
                <?php  echo form_button($cancel);?>

          </td>
      </tr>
      </table>
      <?php
      echo form_fieldset_close();
      echo form_close();?>

</body>
</html>