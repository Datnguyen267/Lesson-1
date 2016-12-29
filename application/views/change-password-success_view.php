<?php
$t = $this->session->userdata('user');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lesson1</title>
</head>

<body>
    <div align="left" align= "top"> <a href="<?php echo base_url();?>home">Home </a></div>
    <p valign = "top" align = "right" >Xin chào <span><?php echo $t['username'];?></span></p>
    <p align ='center'>Your password changed succesful.</p>

</body>
</html>