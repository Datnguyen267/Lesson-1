<!DOCTYPE html>
<html>
    <head>
        <title>Lesson1</title>
    </head>
    <body>
        <div id="container">
        <?php $t = $this->session->userdata('user');?>
        <p valign = "top" align = "right" >Xin chào <span><?php echo $t['username'];?></span></p>
            <h1>Home</h1>

            <div id="body">
                <a href="profile">1. Profile</a> </br>
                <a href = "changeemail">2. Change email </a> </br>
                <a href = "changepassword">3. Change password </a> </br>
                <a href = "<?php echo base_url();?>home/logout">4. Logout </a>
            </div>
        </div>

    </body>
</html>