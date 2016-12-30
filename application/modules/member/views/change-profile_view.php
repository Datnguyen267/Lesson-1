<?php
 $currentUser = $this->session->userdata('user');
 $fname = $currentUser['fullname'];
 $uname = $currentUser['username'];
 $email = $currentUser['email'];
 $address = $currentUser['address'];
 $tsex = $currentUser['sex'];
 if($tsex == 1){
     $sex = 1;
 }else{
     $sex = 2;
 }
 $birthday = $currentUser['birthday'];
$date = explode("-", $birthday);
?>
<div id = 'body'>
     <?php
      echo form_open(base_url()."member/profile/change_profile",'class = "profile"');
      echo form_fieldset("Change Profile"); ?>
      <table align = "center">
          <td>
                <?php echo form_label("Fullname : ");?>
          </td>
          <td>
               <?php echo form_input('fullname',$fname). "<span class = 'f'> </span>"."<br />";?>
          </td>
          <td>
                  <?php echo form_error('fullname');?>
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
                <?php echo form_input('address',$address)."<span class = 'a'> </span>"."<br />";?>
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
                <?php
                if($sex == 1){
                    echo form_radio('sex','1',TRUE)."Male".form_radio('sex','2')."Female    "."<span class = s> </span>"."<br />";
                }else{
                    echo form_radio('sex','1')."Male".form_radio('sex','2',TRUE)."Female    "."<span class = s> </span>"."<br />";
                }
                ?>
          </td>
           <td>
                  <?php echo form_error('sex');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Birthday : ");?>
          </td>
          <td>
                <?php
                echo "<select  name = 'bday' class='day'>";
                for($i=1;$i<=31;$i++){
                    if($i == $date[2]){
                        echo "<option value = '$i' selected>$i</option> ";
                    }else{
                        echo "<option value = '$i'>$i</option> ";
                    }
                }
                echo "</select>";


                echo "<select name = 'bmonth' class='month'>";
                for($i=1;$i<=12;$i++){
                    if($i == $date[1]){
                        echo "<option value = '$i' selected>$i</option> ";
                    }else{
                        echo "<option value = '$i'>$i</option> ";
                    }
                }
                echo "</select>";

                echo "<select name = 'byear' class='year'>";
                for($i=date('Y');$i>= date('Y') -100 ;$i--){
                    if($i == $date[0]){
                        echo "<option value = '$i' selected>$i</option> ";
                    }else{
                        echo "<option value = '$i'>$i</option> ";
                    }
                }
                echo "</select>"."<span class = b> </span>";
                ?>
          </td>
          <td>
                  <?php echo form_error('birthday');?>
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
</div>