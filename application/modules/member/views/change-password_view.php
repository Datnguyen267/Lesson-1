<?php
$t = $this->session->userdata('user');
?>
     <?php
      echo form_open(base_url()."member/changepassword/change_password", 'class = "password"');
      echo form_fieldset("Change your password"); ?>
      <table align = "center">
      <tr>
          <td>
                <?php echo form_label("Old password : ");?>
          </td>
          <td>
                <?php echo form_password('oldpass')."<span class = o></span>"."<br />";?>
          </td>
          <td id = "error">
                  <?php echo form_error('oldpass');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("New password : ");?>
          </td>
          <td>
                <?php echo form_password('password')."<span class = p></span>"."<br />";?>
          </td>
           <td id = "error">
                  <?php echo form_error('password');?>
          </td>
      </tr>
      <tr>
          <td>
                <?php echo form_label("Confirm new password : ");?>
          </td>
          <td>
                <?php echo form_password('renewpass')."<span class = r></span>"."<br />";?>
          </td>
           <td id = "error">
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