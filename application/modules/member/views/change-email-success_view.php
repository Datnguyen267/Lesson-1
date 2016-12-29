<?php
$t = $this->session->userdata('user');
$email = $t['email'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
</head>

<body>
    <p>A confirmation email has been sent to <?php echo $this->input->post('email')?></p>
    <p>Please click on the Confirmation Link to confirm your new email.</p>

</body>
</html>