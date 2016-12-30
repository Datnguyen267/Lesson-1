<?php
 $currentUser = $this->session->userdata('user');
 $fname = $currentUser['fullname'];
 $uname = $currentUser['username'];
 $email = $currentUser['email'];
 $address = $currentUser['address'];
 $tsex = $currentUser['sex'];
 if($tsex == 1){
     $sex = 'Male';
 }else{
     $sex = 'Female';
 }
 $birthday = $currentUser['birthday'];
?>
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