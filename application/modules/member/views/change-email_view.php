<?php
$t = $this->session->userdata('user');
$email = $t['email'];
?>
     <?php
      echo form_open(base_url()."member/changeemail/change_email",'class = "email"');
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
